<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('user_program_id')->default(0); //
            $table->integer('exercise_id')->default(0); //какие делать упражнения
            $table->string('description', 40)->nullable(); //8-10 повторений,как делать упражнение
            $table->string('repmin', 10)->default(0); //повт-мин
            $table->string('kgkm', 10)->default(0); //кг-км
            $table->integer('program_week_id')->default(0);
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
        Schema::dropIfExists('user_trainings');
    }
}
