<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_trainings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('program_id'); //
            $table->smallInteger('exercise_id'); //какие делать упражнения
            $table->string('description'); //8-10 повторений,как делать упражнение
            $table->string('lang', 3); //язык
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
        Schema::dropIfExists('sport_trainings');
    }
}
