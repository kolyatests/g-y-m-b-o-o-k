<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_months', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code'); //
            $table->string('lang', 3); //язык
            $table->string('text', 50); //название месяца полное
            $table->string('txt', 50); //название месяца короткое
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
        Schema::dropIfExists('sport_months');
    }
}
