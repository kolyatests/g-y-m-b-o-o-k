<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_results', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('exercise_id')->nullable(); //какие делать упражнения
            $table->string('activity_days_id', 10)->nullable(); //id активности юзера -- день тренировки
            $table->float('rep_min')->default(0); //повтор или минут
            $table->float('kg_km')->default(0); //кг или км
            $table->string('comment', 20)->nullable(); //комментарий
            $table->smallInteger('sort')->default(0); //
            $table->smallInteger('active')->default(0); //
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
        Schema::dropIfExists('user_results');
    }
}
