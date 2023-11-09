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
        Schema::create('yearly_plan_details_edit_histories', function (Blueprint $table) {
            $table->id();

            $table->text('column_name')->nullable();
            $table->text('column_value')->nullable();
            $table->bigInteger('edit_by_user')->nullable();

            $table->bigInteger('yearly_plan_id')->nullable();
            $table->bigInteger('yearly_plan_details_id')->nullable();

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
        Schema::dropIfExists('yearly_plan_details_edit_histories');
    }
};