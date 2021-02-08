<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_weights', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('weight_id'); //id названия по языку >1<--rus
            $table->string('lang', 3); //язык >rus<
            $table->string('name', 20); //названия мер весов на разных языках >Кг<
            $table->timestamps();
            $table->softDeletes();

            //пример рус-кг, анг-фунт
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_weights');
    }
}
