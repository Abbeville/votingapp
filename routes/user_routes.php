<?php
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'verification', 'middleware' => ['verify.finger']], function(){
        Route::get('/', 'DashboardController@index')->name('user.dashboard');
    });

    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', 'ProfileController@index')->name('user.profile');
        Route::post('/update', 'ProfileController@update')->name('user.profile.update');
    });

    Route::group(['prefix' => 'vote'], function(){
        Route::get('/', 'VoteController@index')->name('user.vote');
        Route::post('/', 'VoteController@store')->name('user.vote');
    });
});