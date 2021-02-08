<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShopProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shop_programs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('workout_plan_id')->default(0);
            $table->integer('status')->default(0); //1-хочу купить  2-куплена 3-добавленна в мои тренировки
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
        Schema::dropIfExists('user_shop_programs');
    }
}
