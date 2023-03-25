<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('user.project.index');
    }

    public function detail($id){
        return view('user.project.detail');
    }

    public function create(){
        return view('user.project.create');
    }

    public function edit($id){
        return view('user.project.edit');
    }
}
