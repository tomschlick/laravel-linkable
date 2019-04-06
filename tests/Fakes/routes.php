<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'PostsController@index')->name('post.index');
    Route::get('create', 'PostsController@create')->name('post.create');
    Route::post('/', 'PostsController@store')->name('post.store');
    Route::group(['prefix' => '{post_id}'], function () {
        Route::get('/', 'PostsController@edit')->name('post.show');
        Route::get('edit', 'PostsController@edit')->name('post.edit');
        Route::patch('/', 'PostsController@update')->name('post.update');
        Route::delete('/', 'PostsController@destroy')->name('post.destroy');
    });
});
