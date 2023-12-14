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
        Schema::create('department_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('serial')->nullable();
            $table->string('plan_details')->nullable();
            $table->string('section')->nullable();
            $table->string('sub_section')->nullable();
            $table->bigInteger('dofa_id')->nullable();
            $table->bigInteger('plan_category_id')->nullable();
            $table->bigInteger('numeric_value')->nullable();
            $table->date('deadline')->nullable();
            $table->string('complete_month', 20)->nullable();
            $table->bigInteger('how_much_was_incomplete')->unsigned()->nullable();
            $table->string('comment')->nullable();
            $table->bigInteger('budget_id')->nullable();
            $table->integer('is_archive')->unsigned()->default(0);
            $table->bigInteger('umbrella_id')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_plans');
    }
};