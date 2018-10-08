<?php

Route::get('/', "HomeController@index")->name('home');

Route::get('/test', "TestController@index")->name('test');
Route::get('/test/view', "TestController@view")->name('test.view');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/mobile-reset', 'Auth\ResetPasswordController@showMobileResetForm')->name('password.mobile_reset');
Route::post('password/mobile-reset', 'Auth\ResetPasswordController@mobileReset');

Route::resource('product', 'ProductController');

Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
    Route::post('/verification', "SupportController@verificationCode")->name('verification');
});


Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', "ProfileController@show");
    Route::get('/profile', "ProfileController@show")->name('profile.edit');
    Route::post('/profile', "ProfileController@update");

    Route::get('/wallet', "WalletController@show")->name('wallet.show');

    Route::resource('media', 'MediaController');
    Route::get('/media/verification/{id}', 'MediaController@showVerificationForm')->name('media.verification');
    Route::post('/media/verification/{id}', 'MediaController@verification');

    Route::resource('scheme', 'SchemeController');
    Route::resource('template', 'TemplateController');

});
