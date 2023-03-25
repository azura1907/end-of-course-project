<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEmployeeController extends Controller
{
    public function index(){
        return view('user.employee.index');
    }

    public function detail(){
        return view('user.employee.detail');
    }

    public function create(){
        return view('user.employee.create');
    }

    public function edit(){
        return view('user.employee.edit');
    }
}
