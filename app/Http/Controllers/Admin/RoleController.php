<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();

        return view('admin.role.index', ['roles' => $roles]);
    }

    public function create(){
        return view('admin.role.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('roles')->insert($data);

        return redirect()->route('admin.role.index')->with('success', 'Role successfully created');
    }

    public function edit($id){
        $role = DB::table('roles')->where('role_id', $id)->first();

        return view('admin.role.edit', ['role' => $role]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        $data['user_id'] = 1;
        
        DB::table('roles')->where('role_id', $id)->update($data);

        return redirect()->route('admin.role.index')->with('success', 'Role was successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('roles')->where('role_id', $id)->delete();

        return redirect()->route('admin.role.index')->with('success', 'Role was successfully deleted');
    }
}
