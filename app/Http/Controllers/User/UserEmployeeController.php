<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserEmployeeController extends Controller
{
    public function index(){
        // $employees = DB::table('employees')->orderBy('created_at', 'DESC')->get();
        $employees = DB::table('employees')
        ->join('departments', 'departments.department_id', '=', 'employees.department')
        ->join('roles', 'roles.role_id', '=', 'employees.role')
        ->where('employees.view_right','<>',1)
        ->select('employees.*','departments.department_name','roles.role_name')
        ->get();

        // dd($employees);
        return view('user.employee.index',['employees' => $employees]);
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
        return view('user.employee.detail',
        [
            'employee' => $employee,
            'personalInfo' => $empPersonalInfo,
            'department' => $departmentData,
            'role' => $roleData
        ]
    );
    }
}
