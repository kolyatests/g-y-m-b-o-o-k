<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); //название
            $table->string('slug')->nullable(); //ссылка
            $table->text('content')->nullable(); //полный текст
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->default(0); //какая категория
            $table->integer('user_id')->default(0); //кто написал
            $table->integer('status')->default(0); //
            $table->integer('views')->default(0); //количество просмотров
            $table->integer('is_featured')->default(0); //показ в рекомендованых
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
        Schema::dropIfExists('book_posts');
    }
}
