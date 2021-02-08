<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_program_weeks', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('program_week_id'); //
            $table->string('name'); //название плана тренировки>Мужчина. Набор массы. 2 неделя (средний)
            $table->text('description')->nullable(); //описание плана тренировок>Упражнения внутри суперсета выполняются поочередно без отдыха. Выполнение всех упражнений внутри суперсета считается одним подходом, после чего Вы отдыхаете пару минут и заново приступаете к выполнению суперсета. После выполнения заданного количества подходов переходите к следующему суперсету.
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
        Schema::dropIfExists('sport_program_weeks');
    }
}
