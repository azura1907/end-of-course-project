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
use App\Http\Controllers\ErrorController;
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
    return view('auth/login');
});

Route::get('unauthorized', [ErrorController::class, 'unauthorized'])->name('unauthorized');

Route::get('send-mail', [SendMailController::class, 'send'])->name('send');

Route::prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('project', [DashboardController::class, 'project'])->name('project');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'viewLogin'])->name('viewLogin');
    Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

    Route::prefix('admin')->name('admin.')->middleware(['checkLogin','checkRole'])->group(function () {
        Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('skill')->controller(SkillController::class)->name('skill.')->middleware(['checkLogin','checkRole'])->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('project-category')->controller(ProjectCategoryController::class)->name('project-category.')->middleware(['checkLogin','checkRole'])->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('department')->controller(DepartmentController::class)->name('department.')->middleware(['checkLogin','checkRole'])->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('employee')->controller(EmployeeController::class)->name('employee.')->middleware(['checkLogin','checkRole'])->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detailInfo')->name('detailInfo');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::get('info-edit/{id}', 'infoEdit')->name('infoEdit');
            Route::post('updateDetailInfo/{id}', 'updateDetailInfo')->name('updateDetailInfo');
            Route::post('update/{id}','update')->name('update');
            Route::get('updatePw/{id}','updatePw')->name('updatePw');
            Route::post('storeNewPassword/{id}','storeNewPassword')->name('storeNewPassword');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('project')->controller(ProjectController::class)->name('project.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->middleware('checkRole')->name('create');
            Route::post('store','store')->middleware('checkRole')->name('store');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->middleware('checkRole')->name('edit');
            Route::post('update/{id}','update')->middleware('checkRole')->name('update');
            Route::get('destroy/{id}', 'destroy')->middleware('checkRole')->name('destroy');
        });

        Route::prefix('employee')->controller(UserEmployeeController::class)->name('employee.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detailInfo')->name('detailInfo');
        });

        Route::prefix('task')->controller(TaskController::class)->name('task.')->middleware('checkLogin')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create/{project_id}','create')->middleware('checkRole')->name('create');
            Route::post('store','store')->middleware('checkRole')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->middleware('checkRole')->name('destroy');
        });
    });