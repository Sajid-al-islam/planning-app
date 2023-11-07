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
        Schema::create('yearly_plan_orjitobbo_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('yealy_plan_id')->nullable();
            $table->bigInteger('yealy_plan_details_id')->nullable();
            $table->integer('serial')->nullable();
            $table->string('title',100)->nullable();
            $table->integer('amount' )->nullable();
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
        Schema::dropIfExists('yearly_plan_orjitobbo_targets');
    }
};