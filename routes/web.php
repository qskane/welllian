<?php


Route::get('/', "HomeController@index")->name('home');
Route::get('/test', "HomeController@test")->name('test');
Auth::routes(['verify' => true]);

Route::resource('product', 'ProductController');
Route::resource('member', 'League\\MemberController');

Route::get('/test', "HomeController@test")->name('test');

Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
    Route::post('/mobile-verification-code', "SupportController@mobileVerificationCode")->name('mobile_verification_code');
});


