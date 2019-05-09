<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'TestController@index');

Route::prefix('cms')->group(function () {
    Route::get('/', 'CmsController@index');
    Route::get('/{any}', 'CmsController@index')->where('any', '.*');

//    Old route
//    Route::resource('product', 'CMS\ProductController');
});
