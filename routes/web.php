<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::prefix('cms')->middleware('auth')->group(function () {
	Route::get('/', 'CmsController@index');
	Route::get('/{any}', 'CmsController@index')->where('any', '.*');
});

Route::get('/test', 'TestController@index');
