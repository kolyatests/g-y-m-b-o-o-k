<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgramWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_program_weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('trainer_id')->default(0); // тренировка тренера(если 0-своя)
            $table->integer('program_week_id')->default(0); //если програма  своя 1000+
            $table->integer('workout_plan_week_id')->default(0); //если програма из готовых взята
            $table->string('name', 100); //название плана тренировки>Мужчина. Набор массы. 2 неделя (средний)
            $table->string('description', 300)->nullable(); //описание плана тренировок>Упражнения внутри суперсета выполняются поочередно без отдыха. Выполнение всех упражнений внутри суперсета считается одним подходом, после чего Вы отдыхаете пару минут и заново приступаете к выполнению суперсета. После выполнения заданного количества подходов переходите к следующему суперсету.
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
        Schema::dropIfExists('user_program_weeks');
    }
}
