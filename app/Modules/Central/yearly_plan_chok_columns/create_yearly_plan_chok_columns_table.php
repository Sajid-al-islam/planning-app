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
        Schema::create('yearly_plan_chok_columns', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id', 200)->nullable();
            $table->bigInteger('chok_id')->nullable();
            $table->bigInteger('row_no')->nullable();
            $table->bigInteger('table_chok_no')->default(1);
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->bigInteger('colspan')->nullable();
            $table->bigInteger('rowspan')->nullable();
            $table->bigInteger('ishide')->default(0)->nullable();
            $table->tinyInteger('isselected')->default(0)->nullable();
            $table->tinyInteger('isheading')->default(0)->nullable();
            $table->integer('width')->nullable();
            $table->string('background_color', 10)->nullable();
            $table->string('border', 10)->nullable();
            $table->tinyInteger('text_rotate')->default(0)->nullable();
            $table->integer('rotate')->default(0)->nullable();
            $table->integer('top')->default(0)->nullable();
            $table->integer('left')->default(0)->nullable();
            $table->integer('font_size')->default(14)->nullable();

            
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
        Schema::dropIfExists('yearly_plan_chok_columns');
    }
};