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
        Schema::create('yearly_plan_details_chok_values', function (Blueprint $table) {
            $table->id();
            $table->integer('serial')->nullable();
            $table->string('value')->nullable();

            $table->bigInteger('yearly_plan_id')->nullable();
            $table->bigInteger('yearly_plan_details_id')->nullable();
            $table->bigInteger('yearly_plan_details_chok_id')->nullable();
            $table->bigInteger('yearly_plan_details_chok_column_id')->nullable();

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
        Schema::dropIfExists('yearly_plan_details_chok_values');
    }
};