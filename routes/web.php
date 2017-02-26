<?php

use App\Tweet;

Route::get('/', 'TwitterController@create');
Route::post('/', 'TwitterController@store');
Route::get('/{id}/delete', 'TwitterController@destroy');
Route::get('/tweets/{id}', 'TwitterController@singleTweet');
Route::get('/tweets/{id}/edit', 'TwitterController@edit');
Route::post('/tweets/{id}/update', 'TwitterController@update');
