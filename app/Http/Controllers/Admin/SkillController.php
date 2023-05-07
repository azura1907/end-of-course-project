<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Skill\StoreRequest;
use App\Http\Requests\Admin\Skill\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function index(){
        $skills = DB::table('skills')->orderBy('created_at', 'DESC')->get();

        return view('admin.skill.index', ['skills' => $skills]);
    }

    public function create(){
        return view('admin.skill.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('skills')->insert($data);

        return redirect()->route('admin.skill.index')->with('success', 'Skill successfully created');
    }

    public function edit($id){
        $skill = DB::table('skills')->where('skill_id', $id)->first();

        return view('admin.skill.edit', ['skill' => $skill]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        $data['user_id'] = 1;
        
        DB::table('skills')->where('skill_id', $id)->update($data);

        return redirect()->route('admin.skill.index')->with('success', 'Skill was successfully updated');
    }

    public function destroy($id = '')
    {
        DB::table('skills')->where('skill_id', $id)->delete();

        return redirect()->route('admin.skill.index')->with('success', 'Skill was successfully deleted');
    }
}
