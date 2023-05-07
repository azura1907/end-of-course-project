<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Task\StoreRequest;
use App\Http\Requests\User\Task\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTaskNoti;
use App\Mail\SendAssigneeUpdateNoti;

class TaskController extends Controller
{
    public function index(){
        $task = DB::table('tasks')->orderBy('created_at', 'DESC')->get();
        return view('user.task.index', ['tasks' => $task]);
    }

    public function detail($id){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        return view('user.task.detail', [
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments
        ]);
    }

    public function create($project_id){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $projects = DB::table('projects')->orderBy('created_at', 'DESC')->get();
        return view('user.task.create', [
            'roles' => $roles,
            'skills' => $skills,
            'project_categories' => $project_categories,
            'employees' => $employees,
            'departments' => $departments,
            'projects' => $projects,
            'project_id' => $project_id
        ]);
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        // dd($data['task_name']);
        $data['assigned_by'] = Auth::user()->id;
        $data['task_status'] = 1;

        //get assignee email to send
        $assignee = $request->only('assignee');
        $assigned_by = $request->only('assigned_by');
        $assignedByFullname = DB::table('employees')->where('id', $assigned_by)->select('fullname')->first();
        $assigneeEmail = DB::table('employees')->where('id', $assignee)->select('email')->first();
        $assigneeFullname = DB::table('employees')->where('id', $assignee)->select('fullname')->first();
        // dd($assigneeFullname);
        DB::table('tasks')->insert($data);

        $emaildata = [];
        $emaildata['name'] = $assigneeFullname->fullname;
        $emaildata['from'] = 'Task Management App';
        $emaildata['assigned_by'] = $assignedByFullname->fullname;

        // dd($emaildata);

        Mail::to($assigneeEmail)->send(new SendTaskNoti($emaildata));

        return redirect()->route('user.project.index')->with('success', 'Task successfully created');
    }

    public function edit($task_id){

        $task = DB::table('tasks')->where('task_id', $task_id)->first();
        $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $projects = DB::table('projects')->orderBy('created_at', 'DESC')->get();

        return view('user.task.edit', [
            'task' => $task,
            'projects' => $projects,
            'employees' => $employees
        ]);
    }

    public function update(UpdateRequest $request, $id) {
        //get old task info
        $oldTaskData = DB::table('tasks')->where('task_id', $id)->first();
        $oldAssginee = $oldTaskData->assignee;
        $oldAssgineeEmail = DB::table('employees')->where('id', $oldAssginee)->select('email')->first();
        $oldAssgineeFullname = DB::table('employees')->where('id', $oldAssginee)->select('fullname')->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        // dd($oldTaskData, $data);
        // DB::table('tasks')->where('task_id', $id)->update($data);

        //get assignee email to send
        $assignee = $request->only('assignee');
        $assigned_by = $oldTaskData->assigned_by;
        $assignedByFullname = DB::table('employees')->where('id', $assigned_by)->select('fullname')->first();
        $assigneeEmail = DB::table('employees')->where('id', $assignee)->select('email')->first();
        $assigneeFullname = DB::table('employees')->where('id', $assignee)->select('fullname')->first();

        // dd($oldAssgineeEmail->email,$assigneeEmail->email,strcmp($oldAssgineeEmail->email, $assigneeEmail->email),strcmp($oldAssgineeEmail->email, $assigneeEmail->email) !== 0);
        
        //check for task info changes
        $taskNameDiff = strcmp($oldTaskData->task_name, $data['task_name']);
        $taskAssigneeDiff = strcmp($oldAssgineeEmail->email, $assigneeEmail->email);
        $taskStartDateDiff = strcmp($oldTaskData->task_start_date, $data['task_start_date']);
        $taskEndDateDiff = strcmp($oldTaskData->task_end_date, $data['task_end_date']);
        $taskCostDiff = strcmp($oldTaskData->task_estimated_cost, $data['task_estimated_cost']);
        $taskDescDiff = strcmp($oldTaskData->task_description, $data['task_description']);
        $taskStatusDiff = strcmp($oldTaskData->task_status, $data['task_status']);

        $emaildata = [];
        $emaildata['name'] = $assigneeFullname->fullname;
        $emaildata['from'] = 'Task Management App';
        $emaildata['assigned_by'] = $assignedByFullname->fullname;
        $emaildata['task_name'] = $data['task_name'];

        if ($taskAssigneeDiff !== 0) {
            $emaildata['old_assignee'] = $oldAssgineeFullname->fullname;
            $emaildata['new_assignee'] = $assigneeFullname->fullname;
            Mail::to($assigneeEmail)->send(new SendTaskNoti($emaildata));
        }
        if ($taskNameDiff !== 0) {
            $emaildata['old_task_name'] = $oldTaskData->task_name;
            $emaildata['new_task_name'] = $data['task_name'];
        }
        if ($taskStartDateDiff !== 0) {
            $emaildata['old_start_date'] = $oldTaskData->task_start_date;
            $emaildata['new_start_date'] = $data['task_start_date'];
        }
        if ($taskEndDateDiff !== 0) {
            $emaildata['old_end_date'] = $oldTaskData->task_end_date;
            $emaildata['new_end_date'] = $data['task_end_date'];
        }
        if ($taskCostDiff !== 0) {
            $emaildata['old_cost'] = $oldTaskData->task_estimated_cost;
            $emaildata['new_cost'] = $data['task_estimated_cost'];
        }
        if ($taskDescDiff !== 0) {
            $emaildata['old_desc'] = $oldTaskData->task_description;
            $emaildata['new_desc'] = $data['task_description'];
        }
        if ($taskStatusDiff !== 0) {
            $emaildata['old_status'] = $oldTaskData->task_status;
            $emaildata['new_status'] = $data['task_status'];
        }

        // dd($emaildata);
        Mail::to($oldAssgineeEmail->email)->send(new SendAssigneeUpdateNoti($emaildata));

        return redirect()->route('user.project.index')->with('success', 'Task successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('tasks')->where('task_id', $id)->delete();

        return redirect()->route('user.project.index')->with('success', 'Task was successfully deleted');
    }
    
}
