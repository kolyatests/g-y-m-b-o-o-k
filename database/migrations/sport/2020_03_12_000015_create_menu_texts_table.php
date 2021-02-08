<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_menu_texts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('menu_id'); //
            $table->string('lang', 3); //язык
            $table->string('text', 50); //название мышц для меню
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
        Schema::dropIfExists('sport_menu_texts');
    }
}
