<?php

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::group(['prefix' => 'users'], function(){
        Route::get('', 'UserController@index')->name('admin.users.index');
        Route::get('archived', 'UserController@archived')->name('admin.users.archived');
        Route::get('create', 'UserController@create')->name('admin.users.create');
        Route::post('store', 'UserController@store')->name('admin.users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('admin.users.edit');
        Route::post('update/{id}', 'UserController@update')->name('admin.users.update');
        // Route::post('update-thumbnail/{id}', 'usersController@updateThumbnail')->name('admin.users.update-thumbnail');
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('/all', 'UserController@index')->name('user.all');
    });

    Route::group(['prefix' => 'categories', 'name' => 'admin'], function(){
        Route::get('/', 'CategoryController@index')->name('admin.category.all');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');
        Route::get('/delete/{category}', 'CategoryController@delete')->name('admin.category.delete');
    });

     Route::group(['prefix' => 'contests', 'name' => 'admin'], function(){
        Route::get('/', 'ContestController@index')->name('admin.contest.all');
        Route::get('/create', 'ContestController@create')->name('admin.contest.create');
        Route::post('/store', 'ContestController@store')->name('admin.contest.store');
        Route::get('/delete/{contest}', 'ContestController@delete')->name('admin.contest.delete');
    });

    Route::group(['prefix' => 'contestants', 'name' => 'admin'], function(){
        Route::get('/', 'ContestantController@index')->name('admin.contestant.all');
        Route::get('/create', 'ContestantController@create')->name('admin.contestant.create');
        Route::post('/store', 'ContestantController@store')->name('admin.contestant.store');
        Route::get('/delete/{contestant}', 'ContestantController@delete')->name('admin.contestant.delete');
    });

    Route::group(['prefix' => 'votes', 'name' => 'admin'], function(){
        Route::get('/', 'VoteController@index')->name('admin.vote.all');
        Route::get('/winner', 'VoteController@winner')->name('admin.vote.winner');
        Route::get('/start', 'VoteController@start')->name('admin.vote.start');
        Route::get('/end', 'VoteController@end')->name('admin.vote.end');
    });
});