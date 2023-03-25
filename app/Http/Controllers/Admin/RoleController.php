<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('admin.role.index');
    }

    public function detail(){
        return view('admin.role.detail');
    }

    public function create(){
        return view('admin.role.create');
    }

    public function edit(){
        return view('admin.role.edit');
    }
}
