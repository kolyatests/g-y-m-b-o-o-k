<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_exercises', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('exercise_id');
            $table->tinyInteger('menu_id');
            $table->string('img_prev', 50);
            $table->text('img');
            $table->string('muscle_first', 50)->nullable();
            $table->string('muscle_second', 50)->nullable();
            $table->tinyInteger('difficulty')->nullable();
            $table->tinyInteger('equipment')->nullable();
            $table->tinyInteger('use_weight')->default(0);
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
        Schema::dropIfExists('sport_exercises');
    }
}
