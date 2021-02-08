<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(0); //1-админ 2-тренер 3-модератор
            $table->integer('trainer_code')->default(0); //код для связи с юзером
            $table->string('avatar')->nullable(); //
            $table->string('name')->nullable(); //;//

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->integer('verify')->default(User::EMAIL_UNVERIFIED);
            $table->timestamp('email_verified_at')->nullable(); //
            $table->string('email')->unique()->nullable(); //
            $table->string('password')->default('$2y$10$YspIEIH4I2b6ilQS/N8yY.elFg2v5ovmc/MW471LTWw5r0.Rm35s.'); //1
            $table->integer('ban')->default(0); //

            $table->string('lang_id')->default('rus'); //язык
            $table->tinyInteger('weight_id')->default(1);//;//кг,фунт-Измерение массы
            $table->tinyInteger('unit_id')->default(1);//;//м,миля-Измерение расстояния
            $table->tinyInteger('calendar_id')->default(1);//;//пн,вс-начало недели


            $table->string('provider')->nullable(); //
            $table->string('provider_id')->nullable()->unique(); //
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
