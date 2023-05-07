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
            $table->string('project_title');
            $table->string('project_description')->nullable();
            $table->date('project_start_date');
            $table->date('project_end_date');
            $table->integer('project_estimated_cost');
            $table->tinyInteger('project_phase')->defaut(1)->comment('');
            $table->tinyInteger('project_status')->default(1)->comment('');
            $table->unsignedBigInteger('project_lead');
            $table->foreign('project_lead')->references('id')->on('employees');
            $table->unsignedBigInteger('project_category');
            $table->foreign('project_category')->references('category_id')->on('project_categories');
            $table->unsignedBigInteger('department');
            $table->foreign('department')->references('department_id')->on('departments');
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
