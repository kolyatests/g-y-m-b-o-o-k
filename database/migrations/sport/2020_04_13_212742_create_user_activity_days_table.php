<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivityDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activity_days', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //id юзера
            $table->integer('trainer_id')->default(0); // тренировка тренера(если 0-своя)
            $table->smallInteger('active')->default(0); //
            $table->string('date', 10); //когда была тренировка для календаря
            $table->string('muscle', 100); //какие мышци были задействованы
            $table->string('description', 100)->nullable(); //описание тренировки
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
        Schema::dropIfExists('user_activity_days');
    }
}
