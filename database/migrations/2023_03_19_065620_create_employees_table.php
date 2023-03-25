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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment("1: Active & 2: Block");
            $table->integer('month_cost');
            $table->unsignedBigInteger('department');
            $table->foreign('department')->references('department_id')->on('departments');
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('role_id')->on('roles');
            $table->unsignedBigInteger('skill');
            $table->foreign('skill')->references('skill_id')->on('skills');
            $table->index(['employee_id','role','skill']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
