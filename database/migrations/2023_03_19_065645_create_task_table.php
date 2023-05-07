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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->integer('project_id');
            $table->string('task_name');
            $table->string('task_description')->nullable();
            $table->date('task_start_date');
            $table->date('task_end_date');
            $table->integer('task_estimated_cost');
            $table->integer('task_status'); //1 - new, 2 - doing, 3 - done
            $table->integer('assignee');
            $table->integer('assigned_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
