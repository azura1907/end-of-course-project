<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index(){
        return view('admin.project-category.index');
    }

    public function detail(){
        return view('admin.project-category.detail');
    }

    public function create(){
        return view('admin.project-category.create');
    }

    public function edit(){
        return view('admin.project-category.edit');
    }
}
