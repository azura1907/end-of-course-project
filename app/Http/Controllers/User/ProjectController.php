<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Project\StoreRequest;
use App\Http\Requests\User\Project\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $projects = DB::table('projects')
        ->join('project_assignee','projects.project_id', '=', 'project_assignee.project_id')
        ->where('project_assignee.employee_id', Auth::user()->id)->orWhere('projects.project_lead', Auth::user()->id)->select('projects.*')->groupBy('projects.project_id')->get();

        $projectAssignee = DB::table('project_assignee')
        ->join('employees','project_assignee.employee_id', '=', 'employees.id')
        ->select('employees.fullname', 'project_assignee.*')->get();

        $planningProjects = DB::table('projects')
        ->join('project_assignee','projects.project_id', '=', 'project_assignee.project_id')
        ->where('projects.project_phase', 1)
        ->where('project_assignee.employee_id', Auth::user()->id)->select('projects.*')->groupBy('projects.project_id')->get();

        $implementProjects = DB::table('projects')
        ->join('project_assignee','projects.project_id', '=', 'project_assignee.project_id')
        ->where('projects.project_phase', 2)
        ->where('project_assignee.employee_id', Auth::user()->id)->select('projects.*')->groupBy('projects.project_id')->get();

        $testingProjects = DB::table('projects')
        ->join('project_assignee','projects.project_id', '=', 'project_assignee.project_id')
        ->Where('projects.project_phase',3)
        ->where('project_assignee.employee_id', Auth::user()->id)->select('projects.*')->groupBy('projects.project_id')->get();

        $finalizedProjects = DB::table('projects')
        ->join('project_assignee','projects.project_id', '=', 'project_assignee.project_id')
        ->where('projects.project_phase',4)
        ->where('project_assignee.employee_id', Auth::user()->id)->select('projects.*')->groupBy('projects.project_id')->get();
        
        $tasks = DB::table('tasks')
        ->join('projects', 'tasks.project_id', '=', 'projects.project_id')
        ->join('employees','tasks.assignee', '=', 'employees.id')
        ->where('tasks.assignee', Auth::user()->id)->orWhere('tasks.assigned_by', Auth::user()->id)->get();

        $employees = DB::table('employees')
        ->orderBy('created_at', 'DESC')->get();
        // dd($finalizedProjects);
        return view('user.project.index', 
        [
            'projects' => $projects,
            'planningProjects' => $planningProjects,
            'implementProjects' => $implementProjects,
            'testingProjects' => $testingProjects,
            'finalizedProjects' => $finalizedProjects,
            'tasks' => $tasks,
            'employees' => $employees,
            'projectAssignee' => $projectAssignee
        ]);
    }

    public function detail($project_id){
        $project = DB::table('projects')->where('project_id', $project_id)->first();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('projects')->join('departments', 'projects.department', '=', 'departments.department_id')->where('project_id',$project_id)->first();

        $project_categories = DB::table('projects')->join('project_categories', 'projects.project_category', '=', 'project_categories.category_id')
        ->select('projects.*','project_categories.category_name')->where('project_id',$project_id)->first();
        
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();

        $prjLead = DB::table('projects')->join('employees','employees.id', '=', 'projects.project_lead')
        ->select('projects.*','employees.fullname')->where('project_id',$project_id)->first();        

        $prjAssignees = DB::table('project_assignee')->join('employees', 'project_assignee.employee_id','=','employees.id')->where('project_id',$project_id)->get();
        $assigneeData = [];
            for ($i=0; $i < count($prjAssignees); $i++) 
            {
                array_push($assigneeData,$prjAssignees[$i]->fullname);
            }

        $prjSkills = DB::table('project_skills')->join('skills', 'project_skills.required_skill_id','=','skills.skill_id')->where('project_id',$project_id)->get();
        $skillData = [];
            for ($i=0; $i < count($prjSkills); $i++) 
            {
                array_push($skillData,$prjSkills[$i]->skill_name);
            }

        $prjRoles = DB::table('project_roles')->join('roles', 'project_roles.required_role_id','=','roles.role_id')->where('project_id',$project_id)->get();
        $roleData = [];
            for ($i=0; $i < count($prjRoles); $i++) 
            {
                array_push($roleData,$prjRoles[$i]->role_name);
            }
        return view('user.project.detail', [
            'project' => $project,
            'prjLead' => $prjLead,
            'roles' => $roles,
            'prjRoles' => $roleData,
            'prjSkills' => $skillData,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'assigneeData' => $assigneeData,
            'departments' => $departments
        ]);
    }

    public function create(){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $leaders = DB::table('employees')->where('employees.view_right',2)->get();
        return view('user.project.create', [
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments,
            'leaders' => $leaders
        ]);
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token','required_skills', 'employees_id', 'required_roles');
        $data['created_at'] = new \DateTime;
        $skillsData = $request->only('required_skills');
        $assignedEmployees = $request->only('employees_id');
        $rolesData = $request->only('required_roles');
        $projectTitle = $request->only('project_title');
        $projectLead = $request->only('project_lead');
        // dd($data);
        // $data['user_id'] = 1;

        DB::table('projects')->insert($data);
        $targetProject = DB::table('projects')->where('project_title', $projectTitle)->first();

        //insert project skills info
        foreach($skillsData as $skillData){
            for ($i=0; $i < count($skillData); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['required_skill_id'] = $skillData[$i];
                    DB::table('project_skills')->insert($insertData);
                }
        }

        //insert project assginees info
        foreach($assignedEmployees as $assignedEmployee){
            for ($i=0; $i < count($assignedEmployee); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['employee_id'] = $assignedEmployee[$i];
                    DB::table('project_assignee')->insert($insertData);
                }
        }

        //insert project assignee info (project lead)
        DB::table('project_assignee')->insert($projectLead);

        //insert project roles info
        foreach($rolesData as $roleData){
            for ($i=0; $i < count($roleData); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['required_role_id'] = $roleData[$i];
                    DB::table('project_roles')->insert($insertData);
                }   
        }
        
        return redirect()->route('user.project.index')->with('success', 'Project successfully created');
    }

    public function edit($project_id){

        $project = DB::table('projects')->where('project_id', $project_id)->first();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();

        $prjLead = DB::table('projects')->select('project_lead')->where('project_id',$project_id)->first();
        $prjLeadData = [];
        array_push($prjLeadData,$prjLead->project_lead);
        
        $prjAssignees = DB::table('project_assignee')->join('employees', 'project_assignee.employee_id','=','employees.id')->where('project_id',$project_id)->get();
        $assigneeData = [];
            for ($i=0; $i < count($prjAssignees); $i++) 
            {
                array_push($assigneeData,$prjAssignees[$i]->id);
            }

        $prjSkills = DB::table('project_skills')->join('skills', 'project_skills.required_skill_id','=','skills.skill_id')->where('project_id',$project_id)->get();
        $skillData = [];
            for ($i=0; $i < count($prjSkills); $i++) 
            {
                array_push($skillData,$prjSkills[$i]->skill_id);
            }

        $prjRoles = DB::table('project_roles')->join('roles', 'project_roles.required_role_id','=','roles.role_id')->where('project_id',$project_id)->get();
        $roleData = [];
            for ($i=0; $i < count($prjRoles); $i++) 
            {
                array_push($roleData,$prjRoles[$i]->role_id);
            }

        // dd($skillData);
        return view('user.project.edit', [
            'project' => $project,
            'oldPrjLead' => $prjLeadData,
            'roles' => $roles,
            'oldRoles' => $roleData,
            'skills' => $skills,
            'oldSkills' => $skillData,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'oldAssignee' => $assigneeData,
            'departments' => $departments
        ]);
    }

    public function update(UpdateRequest $request, $id) {
        $data = $request->only('project_title','project_category','project_start_date','project_end_date','project_estimated_cost','project_phase',
                                'project_lead','department','project_description');
        $data['updated_at'] = new \DateTime;
        $projectId = $request->only('project_id');
        $targetProject = DB::table('projects')->where('project_id', $projectId)->first();
        $skillsData = $request->only('required_skills');
        $assignedEmployees = $request->only('employees_id');
        $rolesData = $request->only('required_roles');
        $projectLead = $request->only('project_lead');
        $projectLeadData['employee_id'] = $projectLead['project_lead'];
        $projectLeadData['project_id'] = $projectId['project_id'];

        DB::table('projects')->where('project_id', $projectId)->update($data);
        
        //update project skills info
        DB::table('project_skills')->where('project_id',$projectId)->delete();
        foreach($skillsData as $skillData){
            for ($i=0; $i < count($skillData); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['required_skill_id'] = $skillData[$i];
                    DB::table('project_skills')->insert($insertData);
                }
        }

        //update project assginees info
        DB::table('project_assignee')->where('project_id',$projectId)->delete();
        foreach($assignedEmployees as $assignedEmployee){
            for ($i=0; $i < count($assignedEmployee); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['employee_id'] = $assignedEmployee[$i];
                    DB::table('project_assignee')->insert($insertData);
                }
        }

        //insert project assignee info (project lead)
        DB::table('project_assignee')->insert($projectLeadData);

        //update project roles info
        DB::table('project_roles')->where('project_id',$projectId)->delete();
        foreach($rolesData as $roleData){
            for ($i=0; $i < count($roleData); $i++) 
                {   
                    $insertData = [];
                    $insertData['project_id'] = $targetProject->project_id;
                    $insertData['required_role_id'] = $roleData[$i];
                    DB::table('project_roles')->insert($insertData);
                }   
        }

        return redirect()->route('user.project.index')->with('success', 'Project successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('projects')->where('project_id', $id)->delete();
        DB::table('project_assignee')->where('project_id', $id)->delete();
        DB::table('project_skills')->where('project_id', $id)->delete();
        DB::table('project_roles')->where('project_id', $id)->delete();
        DB::table('tasks')->where('project_id', $id)->delete();

        return redirect()->route('user.project.index')->with('success', 'Project was successfully deleted');
    }
}
