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
        ->where('employee_id', Auth::user()->id)->get();

        // dd($projects);
        
        $tasks = DB::table('tasks')
        ->join('projects', 'tasks.project_id', '=', 'projects.project_id')
        ->join('employees','tasks.assignee', '=', 'employees.id')
        ->where('tasks.assignee', Auth::user()->id)->get();

        $employees = DB::table('employees')
        ->orderBy('created_at', 'DESC')->get();
        // dd($tasks);
        return view('user.project.index', 
        [
            'projects' => $projects,
            'tasks' => $tasks,
            'employees' => $employees
        ]);
    }

    public function detail($id){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        return view('user.project.detail', [
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments
        ]);
    }

    public function create(){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        return view('user.project.create', [
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments
        ]);
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token','required_skills', 'employees_id', 'required_roles');
        $data['created_at'] = new \DateTime;
        $skillsData = $request->only('required_skills');
        $assignedEmployees = $request->only('employees_id');
        $rolesData = $request->only('required_roles');
        $projectTitle = $request->only('project_title');
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
        
        return view('user.project.edit', [
            'project' => $project,
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments
        ]);
    }

    public function update(UpdateRequest $request, $id) {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        // dd($data);
        // $data['user_id'] = Auth::user()->id;
        DB::table('projects')->where('project_id', $id)->update($data);

        return redirect()->route('user.project.index')->with('success', 'Project successfully updated');
    }
}
