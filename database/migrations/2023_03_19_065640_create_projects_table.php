<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('estimated_cost');
            $table->tinyInteger('project_phase')->defaut(1)->comment('');
            $table->tinyInteger('project_status')->default(1)->comment('');
            $table->unsignedBigInteger('project_lead');
            $table->foreign('project_lead')->references('employee_id')->on('employees');
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('employee_id')->on('employees');
            $table->unsignedBigInteger('project_category');
            $table->foreign('project_category')->references('category_id')->on('project_categories');
            $table->unsignedBigInteger('required_skills');
            $table->foreign('required_skills')->references('skill_id')->on('skills');
            $table->unsignedBigInteger('required_roles');
            $table->foreign('required_roles')->references('role_id')->on('roles');
            $table->unsignedBigInteger('department');
            $table->foreign('department')->references('department_id')->on('departments');
            $table->index(['required_skills', 'required_roles','employees_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
