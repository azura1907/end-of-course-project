<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        return view('admin.skill.index');
    }

    public function detail(){
        return view('admin.skill.detail');
    }

    public function create(){
        return view('admin.skill.create');
    }

    public function edit(){
        return view('admin.skill.edit');
    }
}
