<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_plans', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('workout_plan_id'); //
            $table->tinyInteger('workout_plan_week_id'); //
            $table->string('img', 50); //
            $table->tinyInteger('gender'); //
            $table->tinyInteger('place'); //
            $table->tinyInteger('specific')->default(0); //
            $table->tinyInteger('difficulty'); //
            $table->tinyInteger('workout_week'); //
            $table->tinyInteger('purpose'); //
            $table->string('equipment', 50); //
            $table->tinyInteger('month')->default(0); //
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_plans');
    }
}
