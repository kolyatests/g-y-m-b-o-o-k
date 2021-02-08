<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_exercise_texts', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('exercise_id'); //
            $table->string('lang', 3); //язык
            $table->string('name', 250); //
            $table->text('text'); //
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_exercise_texts');
    }
}
