<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Task\StoreRequest;
use App\Http\Requests\User\Task\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // dd($data);
        $data['assigned_by'] = Auth::user()->id;
        $data['task_status'] = 1;
        DB::table('tasks')->insert($data);

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
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        // dd($data);
        $data['assigned_by'] = Auth::user()->id;
        DB::table('tasks')->where('task_id', $id)->update($data);

        return redirect()->route('user.project.index')->with('success', 'Task successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('tasks')->where('task_id', $id)->delete();

        return redirect()->route('user.project.index')->with('success', 'Task was successfully deleted');
    }
    
}
