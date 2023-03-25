<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('modules.admin.employee.index');
    }

    public function detail(){
        return view('modules.admin.employee.detail');
    }

    public function create(){
        return view('modules.admin.employee.create');
    }

    public function edit(){
        return view('modules.admin.employee.edit');
    }
}
