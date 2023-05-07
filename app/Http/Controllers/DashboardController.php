<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function employee() {
        return view('dashboard.employee');
    }

    public function project() {
        return view('dashboard.project');
    }
}
