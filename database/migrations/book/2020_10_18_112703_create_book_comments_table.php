<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_comments', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable(); //текст комментария
            $table->integer('user_id')->default(0); //кто написал
            $table->integer('post_id')->default(0); //к какому посту
            $table->integer('status')->default(1); //1-не модерируем  0- модерация перед показом
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('post_id')->references('id')->on('book_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_comments');
    }
}
