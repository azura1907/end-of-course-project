<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserEmployeeController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\SendMailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('master');
});

Route::get('send-mail', [SendMailController::class, 'send'])->name('send');

Route::prefix('dashboard')->name('dashboard.')->middleware('checkLogin')->group(function() {
    Route::get('employee', [DashboardController::class, 'employee'])->name('employee');
    Route::get('project', [DashboardController::class, 'project'])->name('project');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'viewLogin'])->name('viewLogin');
    Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

    Route::prefix('admin')->name('admin.')->middleware('checkLogin')->group(function () {
        Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('skill')->controller(SkillController::class)->name('skill.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('project-category')->controller(ProjectCategoryController::class)->name('project-category.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('department')->controller(DepartmentController::class)->name('department.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('employee')->controller(EmployeeController::class)->name('employee.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::get('info-edit/{id}', 'infoEdit')->name('infoEdit');
            Route::post('storeDetailInfo', 'storeDetailInfo')->name('storeDetailInfo');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('project')->controller(ProjectController::class)->name('project.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('employee')->controller(UserEmployeeController::class)->name('employee.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
        });

        Route::prefix('task')->controller(TaskController::class)->name('task.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create/{project_id}','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });