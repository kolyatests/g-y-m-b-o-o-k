<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_specifics', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code')->nullable(); //
            $table->string('lang', 3)->nullable(); //язык >rus<
            $table->string('name', 100)->nullable(); //названия
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
        Schema::dropIfExists('sport_specifics');
    }
}
