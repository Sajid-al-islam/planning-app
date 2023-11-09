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
        Schema::create('yearly_plan_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->integer('serial')->unsigned()->nullable();
            $table->string('plan_title',100)->nullable();
            $table->bigInteger('dofa_id')->unsigned()->nullable();
            $table->bigInteger('how_much_was_incomplete')->unsigned()->nullable();
            $table->float('ratings')->unsigned()->nullable();
            $table->integer('is_approved')->unsigned()->default(1);
            $table->integer('is_archive')->unsigned()->default(0);
            $table->enum('is_public',['yes','no'])->default('yes');
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('yearly_plan_detail_yearly_plan_hide_for_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('yearly_plan_details_id')->nullable();
            $table->bigInteger('yearly_plan_hide_for_users_id')->nullable();
            $table->timestamps();
        });

        Schema::create('yearly_plan_detail_yearly_plan_complete_by_division', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('yearly_plan_details_id')->nullable();
            $table->bigInteger('yearly_plan_complete_by_divisions_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yearly_plan_details');
        Schema::dropIfExists('yearly_plan_detail_yearly_plan_hide_for_user');
        Schema::dropIfExists('yearly_plan_detail_yearly_plan_complete_by_division');
    }
};