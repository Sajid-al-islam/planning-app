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
        Schema::create('common_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_plan_id')->nullable();
            $table->bigInteger('central_plan_id')->nullable();
            $table->string('plan_title')->nullable();
            $table->date('deadline')->nullable();
            $table->bigInteger('dofa_id')->nullable();

            $table->bigInteger('plan_category_id')->nullable();
            $table->bigInteger('how_much_was_incomplete')->unsigned()->nullable();
            $table->string('comment')->nullable();
            $table->bigInteger('is_archive')->unsigned()->default(0);

            $table->bigInteger('assign_to_id')->unsigned()->nullable();
            $table->bigInteger('is_department')->unsigned()->nullable();

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
        Schema::dropIfExists('common_plans');
    }
};
