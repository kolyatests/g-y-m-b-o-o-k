<?php

use Illuminate\Support\Facades\Route;

Route::name('book.')->middleware(['is_ban', 'auth', 'locate', 'is_verified'])->group(
    function () {
        Route::group(
            [
                'prefix' => 'book', 'namespace' => 'Book',
            ],
            function () {
                Route::get('/', 'BookController@index')->name('main');
                Route::get('/vue', 'BookController@vue')->name('main.vue');
                Route::get('/posts', 'PostController@index')->name('posts.index');
                Route::post('/posts', 'PostController@store')->name('posts.store');
                Route::get('/posts/create', 'PostController@create')->name('posts.create');
                Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
                Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
                Route::get('/posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
                Route::get('/post/{slug}', 'BookController@show')->name('post.show');
                Route::get('/category/{slug}', 'BookController@category')->name('category.show');
                Route::get('/tag/{slug}', 'BookController@tag')->name('tag.show');
                Route::post('/comment', 'CommentController@store')->name('comment');
                Route::get('/comments/{comment}/destroy', 'CommentController@destroy')->name('comment.destroy');
                Route::get('comments/{id}/like', 'CommentController@getLike')->name('comments.like');
                Route::get('/posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
                Route::get('posts/{id}/like', 'PostController@getLike')->name('posts.like');
                Route::get('/search', 'SearchController@getResults')->name('search.results');
                Route::get('/wall', 'WallController@index')->name('wall');
                Route::get('/share_train', 'BookController@shareTrain')->name('share.train');
                Route::get('/share/{day}/{id}', 'BookController@share')->name('share');
                Route::name('friend.')->group(
                    function () {
                        Route::group(
                            [
                                'prefix' => 'friends',
                            ],
                            function () {
                                Route::get('/', 'FriendController@getIndex')->name('index');
                                Route::get('/add/{username}', 'FriendController@getAdd')->name('add');
                                Route::get('/accept/{username}', 'FriendController@getAccept')->name('accept');
                                Route::post('/delete/{username}', 'FriendController@postDelete')->name('delete');
                            }
                        );
                    }
                );

                Route::name('wall.')->group(
                    function () {
                        Route::group(
                            [
                                'prefix' => 'wall',
                            ],
                            function () {
                                Route::post('/', 'WallController@postWall')->name('post');
                                Route::post('/{id}/reply', 'WallController@postReply')->name('reply');
                                Route::get('/{id}/like', 'WallController@getLike')->name('like');
                            }
                        );
                    }
                );
            }
        );
    }
);
