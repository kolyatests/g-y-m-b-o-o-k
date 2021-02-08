<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable(); //название настройки
            $table->string('lang', 3)->nullable(); //язык
            $table->text('text')->nullable(); //описание настройки
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
        Schema::dropIfExists('strings');
    }
}
