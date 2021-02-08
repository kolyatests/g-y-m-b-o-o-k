<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutPlanTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_plan_texts', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('workout_plan_id'); //
            $table->string('lang', 3); //язык
            $table->text('name'); //готовые тренировки
            $table->text('description'); //описание
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
        Schema::dropIfExists('workout_plan_texts');
    }
}
