<?php


Route::get('/', "HomeController@index")->name('home');
Route::get('/test', "HomeController@test")->name('test');
Auth::routes(['verify' => true]);

Route::resource('product', 'ProductController');


