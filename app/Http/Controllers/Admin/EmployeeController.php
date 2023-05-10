<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employee\StoreRequest;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        // $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')->get();
        return view('admin.employee.index',['employees' => $employees]);
    }

    public function detail($id)
    {
        $employee = DB::table('employees')->orderBy('created_at', 'DESC')->get()->first();
        return view('admin.employee.detail',['employee'=> $employee]);
    }

    public function create(){
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();

        return view('admin.employee.create', 
            [
            'departments' => $departments,
            'roles' => $roles,
            'skills' => $skills
            ]
        );
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token','skills');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime;
        $data['created_by'] = Auth::user()->id;

        $employee_name = $request->only('fullname');
        $skills = $request->only('skills');
        $role = $request->only('role');
        $employee_view_right = DB::table('roles')->select('view_right')->where('role_id',$role)->first();

        $data['view_right'] = $employee_view_right->view_right;
        // dd($data);

        //create new employee
        DB::table('employees')->insert($data);
        
        //get target employee for skill updating
        $target_emp = DB::table('employees')->where('fullname', $employee_name)->get()->first();
        foreach ($skills as $skill) {
            for ($i=0; $i < count($skill); $i++) 
            {
                $skillData = [];
                $skillData['employee_id'] = $target_emp->id;
                $skillData['skill_id'] = $skill[$i];
                $skillData['created_at'] = new DateTime();
                DB::table('employee_skills')->insert($skillData);
            }
        }
        return redirect()->route('admin.employee.index')->with('success', 'Employee successfully created');
    }

    public function edit($id){
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        // $employee = DB::table('employees')->join('skills','employees.skill', '=', 'skills.skill_id')
        // ->select('employees.*','skills.skill_name')->where('employees.id',$id)->first();

        return view('admin.employee.edit',
        [
            // 'employee' => $employee,
            'departments' => $departments,
            'roles' => $roles,
            'skills' => $skills
        ]
        );
    }

    public function infoEdit($id){
        $employee = DB::table('employees')->join('employee_infos','employees.id', '=', 'employee_infos.id')
        ->where('employees.id',$id)->first();
        // $employees = DB::table('employees')->join('skills','employees.skill', '=', 'skills.skill_id')->select('employees.*','skills.skill_name')->get();
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();

        return view('admin.employee.info-edit',
        [
            'employee' => $employee,
            'departments' => $departments,
            'roles' => $roles,
            'skills' => $skills
        ]
    );
    }

    public function storeDetailInfo(StoreRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;

        // dd($data);
        DB::table('employee_infos')->insert($data);

        return redirect()->route('admin.employee.index')->with('success', 'Employee infos successfully updated');
    }

}
