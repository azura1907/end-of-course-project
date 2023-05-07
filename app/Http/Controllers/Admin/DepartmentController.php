<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department\StoreRequest;
use App\Http\Requests\Admin\Department\UpdateRequest;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index(){
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();

        return view('admin.department.index', ['departments' => $departments]);
    }

    public function create(){
        return view('admin.department.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('departments')->insert($data);

        return redirect()->route('admin.department.index')->with('success', 'Department successfully created');
    }

    public function edit($id){
        $department = DB::table('departments')->where('department_id', $id)->first();

        return view('admin.department.edit', ['department' => $department]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        $data['user_id'] = 1;
        
        DB::table('departments')->where('department_id', $id)->update($data);

        return redirect()->route('admin.department.index')->with('success', 'Department was successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('departments')->where('department_id', $id)->delete();

        return redirect()->route('admin.department.index')->with('success', 'Department was successfully deleted');
    }
}
