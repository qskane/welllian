<?php


Route::get('/', "HomeController@index")->name('home');
Route::get('/test', "HomeController@test")->name('test');
Auth::routes(['verify' => true]);

Route::resource('product', 'ProductController');
Route::resource('member', 'League\\MemberController');

Route::get('/test', "HomeController@test")->name('test');

Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
    Route::post('/telephone-verification-code', "SupportController@telephoneVerificationCode")->name('telephone_verification_code');
});


