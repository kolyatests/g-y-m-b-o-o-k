<?php

use Illuminate\Support\Facades\Route;

Route::name('book.moderator.')->middleware(['is_ban', 'auth', 'locate', 'is_verified'])->group(
    function () {
        Route::middleware(['is_moderator'])->group(
            function () {
                Route::group(
                    [
                        'prefix' => 'book/moderator', 'namespace' => 'Book\Moderator',
                    ],
                    function () {
                        Route::resource('/users', 'UserController');
                        Route::resource('/categories', 'CategoryController');
                        Route::resource('/tags', 'TagController');
                        Route::resource('/posts', 'PostController');
                        Route::get('/comments', 'CommentController@index')->name('comments.index');
                        Route::get('/comments/toggle/{id}', 'CommentController@toggle')->name('comments.toggle');;
                        Route::delete('/comments/{id}/destroy', 'CommentController@destroy')->name('comments.destroy');
                    }
                );
            }
        );
    }
);

Route::name('book.')->middleware(['is_ban', 'auth'])->group(
    function () {
        Route::group(
            [
                'prefix' => 'book/api', 'namespace' => 'Book\Api',
            ],
            function () {
                Route::post('/comment/store', 'PostController@commentStore')->name('comment.store');
                Route::get('/posts', 'PostController@posts')->name('posts');
                Route::get('/my_posts', 'PostController@myPosts')->name('my.posts');
                Route::get('/popular_posts', 'PostController@popularPosts')->name('popular.posts');
                Route::get('/featured_posts', 'PostController@featuredPosts')->name('featured.posts');
                Route::get('/post_like/{id}', 'PostController@postLike')->name('post.like');
                Route::get('/post/{post_slug}', 'PostController@post')->name('post');
                Route::get('/category/{category_slug}', 'PostController@category')->name('category');
                Route::get('/tag/{tag_slug}', 'PostController@tag')->name('tag');
                Route::get('/sidebar', 'PostController@sidebar')->name('sidebar');
                Route::get('/destroy_post/{id}', 'PostController@destroyPost')->name('destroy.post');
                Route::get('/destroy_comment/{id}', 'PostController@destroyComment')->name('destroy.comment');
                Route::get('/comment_like/{id}', 'PostController@commentLike')->name('comment.like');
            }
        );
    }
);
