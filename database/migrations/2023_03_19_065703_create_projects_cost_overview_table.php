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
        Schema::create('projects_cost_overview', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->unsignedBigInteger('estimated_cost');
            $table->unsignedBigInteger('total_actual_cost');
            $table->tinyInteger('profit_status')->default(1)->comment('1: Profit & 2: Loss');
            $table->integer('profit_detail_in_cash');
            $table->integer('loss_detail_in_cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_cost_overview');
    }
};
