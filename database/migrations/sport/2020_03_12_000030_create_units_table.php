<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_units', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('unit_id'); //id названия по языку >1<--rus
            $table->string('lang', 3); //язык >rus<
            $table->string('name', 20); //названия измерений на разных языках >См<
            $table->timestamps();
            $table->softDeletes();

            //пример рус-см, анг-фут
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_units');
    }
}
