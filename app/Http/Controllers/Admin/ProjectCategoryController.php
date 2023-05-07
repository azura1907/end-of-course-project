<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategory\StoreRequest;
use App\Http\Requests\Admin\ProjectCategory\UpdateRequest;
use Illuminate\Support\Facades\DB;

class ProjectCategoryController extends Controller
{
    public function index(){
        $project_categories = DB::table('project_categories')->orderBy('created_at', 'DESC')->get();
        return view('admin.project-category.index', ['project_categories' => $project_categories]);
    }

    public function detail(){
        return view('admin.project-category.detail');
    }

    public function create(){
        return view('admin.project-category.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('project_categories')->insert($data);

        return redirect()->route('admin.project-category.index')->with('success', 'Project Category created successfully');
    }

    public function edit($id){
        $project_category = DB::table('project_categories')->where('category_id', $id)->first();

        return view('admin.project-category.edit', ['project_category' => $project_category]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        $data['user_id'] = 1;
        
        DB::table('project_categories')->where('category_id', $id)->update($data);

        return redirect()->route('admin.project-category.index')->with('success', 'Project Category was successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('project_categories')->where('category_id', $id)->delete();

        return redirect()->route('admin.project-category.index')->with('success', 'Project Category was successfully deleted');
    }
}
