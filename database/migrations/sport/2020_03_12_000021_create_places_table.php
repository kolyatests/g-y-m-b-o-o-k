<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_places', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code')->nullable(); //id места-зал или улица
            $table->string('lang', 3)->nullable(); //язык >rus<
            $table->string('name', 50)->nullable(); //названия места-зал или улица
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
        Schema::dropIfExists('sport_places');
    }
}
