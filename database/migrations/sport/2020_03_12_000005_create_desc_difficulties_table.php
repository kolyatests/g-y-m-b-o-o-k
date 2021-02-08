<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescDifficultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_desc_difficulties', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code'); //
            $table->string('lang', 3); //язык
            $table->string('name', 50); //сложность
            $table->timestamps();
            $table->softDeletes();
        });

//        $seeder = new DescDifficultySeeder();
//        $seeder->run();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_desc_difficulties');
    }
}
