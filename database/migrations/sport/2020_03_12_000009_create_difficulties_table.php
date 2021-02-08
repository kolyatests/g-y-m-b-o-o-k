<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifficultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_difficulties', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code')->nullable(); //
            $table->string('lang', 3)->nullable(); //язык
            $table->string('name', 50)->nullable(); //результаты сравнивать
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
        Schema::dropIfExists('sport_difficulties');
    }
}
