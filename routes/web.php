<?php


Route::get('/', "HomeController@index")->name('home');
Route::get('/test', "HomeController@test")->name('test');


/*
 * Authentication
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/mobile-reset', 'Auth\ResetPasswordController@showMobileResetForm')->name('password.mobile_reset');
Route::post('password/mobile-reset', 'Auth\ResetPasswordController@mobileReset');


Route::resource('product', 'ProductController');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/{user}', "UserController@show")->name('edit');
    Route::post('/{user}', "UserController@update");

    Route::get('/{user}/wallet', "WalletController@show")->name('wallet.show');

    Route::get('/{user}/media', "MediaController@index")->name('media.index');

});


Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
    Route::post('/verification', "SupportController@verificationCode")->name('verification');
});

