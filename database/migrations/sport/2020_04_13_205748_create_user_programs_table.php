<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_programs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_program_id')->default(0); //
            $table->string('name', 20); //
            $table->string('description', 500)->nullable(); //описание
            $table->integer('program_week_id')->default(0); //если програма из готовых взята
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
        Schema::dropIfExists('user_programs');
    }
}
