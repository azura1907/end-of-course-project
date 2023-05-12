<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function project() {
        $task = DB::table('tasks')->get();
        $taskCount = count($task);

        $doingTasks = DB::table('tasks')->where('task_status', 2)->get();
        $doingCount = count($doingTasks);

        $completedTasks = DB::table('tasks')->where('task_status', 3)->get();
        $completedCount = count($completedTasks);

        $projects = DB::table('projects')->join('employees','projects.project_lead', '=', 'employees.id')->select('projects.*','employees.fullname')->get();
        $projectsCount = count($projects);

        $planningProjects = DB::table('projects')->where('project_phase', 1)->get();
        $planningCount = count($planningProjects);

        $onGoingProjects = DB::table('projects')->where('project_phase', 2)->orWhere('project_phase', 3)->get();
        $onGoingCount = count($onGoingProjects);

        $finalizeProjects = DB::table('projects')->where('project_phase', 4)->get();
        $finalizeCount = count($finalizeProjects);

        // dd($onGoingProjects);
        return view('dashboard.project', [
            'taskCount' => $taskCount,
            'doingCount' => $doingCount,
            'completedCount' => $completedCount,
            'projectCount' => $projectsCount,
            'planningCount' => $planningCount,
            'onGoingCount' => $onGoingCount,
            'finalizeCount' => $finalizeCount,
            'projects' => $projects
        ]);
    }
}
