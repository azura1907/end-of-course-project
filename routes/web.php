<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\User\UserEmployeeController;
use App\Http\Controllers\User\ProjectController;

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

Route::prefix('modules')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('skill')->controller(SkillController::class)->name('skill.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('project-category')->controller(ProjectCategoryController::class)->name('project-category.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('employee')->controller(EmployeeController::class)->name('employee.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });
});

Route::prefix('modules')->group(function(){
    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('project')->controller(ProjectController::class)->name('project.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('employee')->controller(UserEmployeeController::class)->name('employee.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
        });
    });
});