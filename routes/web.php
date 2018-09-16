<?php


Route::get('/', "HomeController@index")->name('home');
Auth::routes();

Route::resource('p', 'ProductController');


