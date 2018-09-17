<?php


Route::get('/', "HomeController@index")->name('home');
Auth::routes(['verify' => true]);

Route::resource('product', 'ProductController');


