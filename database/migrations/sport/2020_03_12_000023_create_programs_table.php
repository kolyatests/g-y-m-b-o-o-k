<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_programs', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('program_id'); //
            $table->smallInteger('program_week_id'); //
            $table->text('name'); //
            $table->text('description'); //описание
            $table->string('lang', 3); //язык
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
        Schema::dropIfExists('sport_programs');
    }
}
