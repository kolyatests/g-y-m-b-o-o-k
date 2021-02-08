<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResultSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_result_saves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('exercise_id')->nullable(); //какие делать упражнения
            $table->string('activity_days_id', 10)->nullable(); //id активности юзера -- день тренировки
            $table->smallInteger('active')->default(0); //
            $table->string('description', 500)->nullable(); //8-10 повторений,как делать упражнение
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
        Schema::dropIfExists('user_result_saves');
    }
}
