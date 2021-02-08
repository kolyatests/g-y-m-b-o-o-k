<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trainers', function (Blueprint $table) {
            $table->id();
            $table->integer('trainer_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->tinyInteger('trainer_true')->default(0); //1-доступ для тренера, только добавлять тренировки,если день пустой,2-полный контроль
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
        Schema::dropIfExists('user_trainers');
    }
}
