<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employee\PersonalInfoUpdateRequest;
use App\Http\Requests\Admin\Employee\StoreRequest;
use App\Http\Requests\Admin\Employee\UpdateRequest;
use App\Http\Requests\User\Employee\UpdateRequest as EmployeeUpdateRequest;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        // $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')
        ->join('departments', 'departments.department_id', '=', 'employees.department')
        ->join('roles', 'roles.role_id', '=', 'employees.role')
        ->select('employees.*','departments.department_name','roles.role_name')
        ->get();

        // dd($employees);
        return view('admin.employee.index',['employees' => $employees]);
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
        $data = $request->except('_token','skills','dob','gender','address','phone');
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

        $employeePersonalInfo = $request->only('dob','gender','address','phone');
        $employeePersonalInfo['id'] = $target_emp->id;
        DB::table('employee_infos')->insert($employeePersonalInfo);

        return redirect()->route('admin.employee.index')->with('success', 'Employee successfully created');
    }

    public function edit($id){
        $departments = DB::table('departments')->orderBy('created_at', 'DESC')->get();
        $roles = DB::table('roles')->orderBy('created_at', 'DESC')->get();
        $empSkills = DB::table('employee_skills')->join('skills', 'employee_skills.skill_id','=','skills.skill_id')->where('employee_id',$id)->get();
        $skillsTableData = DB::table('skills')->orderBy('created_at', 'DESC')->get();
        $skillData = [];
            for ($i=0; $i < count($empSkills); $i++) 
            {
                array_push($skillData,$empSkills[$i]->skill_id);
            }

        // $targetSkills = $skillData->toArray();
        $employee = DB::table('employees')->where('employees.id',$id)->first();

        // dd($skillData);

        return view('admin.employee.edit',
        [
            'employee' => $employee,
            'departments' => $departments,
            'roles' => $roles,
            'skills' => $skillsTableData,
            'oldSkills' => $skillData
        ]
        );
    }

    public function update(UpdateRequest $request, $id) {
        $data = $request->only('password','entry_date','fullname','department','role','status');
        $data['password'] = bcrypt($request->password);
        $data['updated_at'] = new \DateTime;
        $data['created_by'] = Auth::user()->id;

        $employeeId = $request->only('employee_id');
        $skills = $request->only('skills');
        $role = $request->only('role');
        $employee_view_right = DB::table('roles')->select('view_right')->where('role_id',$role)->first();
        
        $data['view_right'] = $employee_view_right->view_right;

        //edit employee info
        $target_emp = DB::table('employees')->where('id', $employeeId)->get()->first();
        
        DB::table('employees')->where('id', $id)->update($data);
        DB::table('employee_skills')->where('employee_id',$target_emp->id)->delete();
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

    public function detailInfo($targetEmp){
        $employee = DB::table('employees')->where('employees.id',$targetEmp)->first();
        $empPersonalInfo = DB::table('employee_infos')->where('id', $employee->id)->first();

        $employeeSkills = DB::table('employees')
        ->join('employee_skills','employees.id', '=', 'employee_skills.employee_id')
        ->join('skills','skills.skill_id', '=', 'employee_skills.skill_id')
        ->select('skills.skill_name')->where('id', $employee->id)->get();
        $skillData = [];
        for ($i=0; $i <count($employeeSkills) ; $i++) { 
            array_push($skillData,$employeeSkills[$i]->skill_name);
        }

        $employeeDepartment = DB::table('employees')
        ->join('departments','employees.department', '=', 'departments.department_id')
        ->select('departments.department_name')->where('id', $employee->id)->get();
        $departmentData = [];
        for ($i=0; $i <count($employeeDepartment) ; $i++) { 
            $departmentData = $employeeDepartment[$i]->department_name;
        }


        $employeeRole = DB::table('employees')->join('roles','employees.role', '=', 'roles.role_id')
        ->select('roles.role_name')->where('id', $employee->id)->get();
        $roleData = [];
        for ($i=0; $i <count($employeeRole) ; $i++) { 
            $roleData = $employeeRole[$i]->role_name;
        }

        // dd($skillData);
        return view('admin.employee.detail',
        [
            'employee' => $employee,
            'personalInfo' => $empPersonalInfo,
            'department' => $departmentData,
            'role' => $roleData
        ]
    );
    }

    public function infoEdit($targetEmp) {
        $personalData = DB::table('employee_infos')->where('id', $targetEmp)->first();

        return view('admin.employee.info-edit',
        [
            'personalData' => $personalData
        ]
        );
    }

    public function updateDetailInfo(PersonalInfoUpdateRequest $request, $id)
    {   
        $empId = $request->only('employee_id');
        
        $data = $request->only('dob','gender','address','phone');
        $data['updated_at'] = new \DateTime;
        DB::table('employee_infos')->where('id',$empId['employee_id'])->update($data);

        return redirect()->route('admin.employee.detailInfo',['id' => $empId['employee_id']])->with('success', 'Employee infos successfully updated');
    }

}
