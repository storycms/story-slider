<?php

Route::get('slider', 'SliderController@index');
Route::post('slider', 'SliderController@store');
Route::get('slider/{id}', 'SliderController@get');
Route::get('slider/{id}/edit', 'SliderController@edit');
Route::put('slider/{id}', 'SliderController@update');
Route::delete('slider/{id}', 'SliderController@destroy');

Route::get('slider/{id}/item', 'SliderItemController@index');
Route::post('slider/{id}/item', 'SliderItemController@store');
Route::get('slider/{id}/item/{item}', 'SliderItemController@edit');
Route::put('slider/{id}/item/{item}', 'SliderItemController@update');
Route::delete('slider/{id}/item/{item}', 'SliderItemController@destroy');
