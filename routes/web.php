<?php

Route::get('/', "WebController@home")->name('home');

/*
 * Test
 */
Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/', "TestController@index")->name('index');
    Route::get('/view', "TestController@view")->name('view');
    Route::get('/league', "TestController@league")->name('league');
});

/*
 * Auth
 */
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('password/mobile-reset', 'ResetPasswordController@showMobileResetForm')->name('password.mobile_reset');
    Route::post('password/mobile-reset', 'ResetPasswordController@mobileReset');
});


/*
 * Support
 */
Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
    Route::post('/verification', "SupportController@verificationCode")->name('verification');
});

/*
 * User
 */
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', "ProfileController@edit")->name('index');
    Route::get('/profile', "ProfileController@edit")->name('profile.edit');
    Route::post('/profile', "ProfileController@update");

    Route::get('/wallet', "WalletController@show")->name('wallet.show');
    Route::get('/wallet/log', "WalletController@log")->name('wallet.log');

    Route::resource('media', 'MediaController');
    Route::get('/media/verification/{id}', 'MediaController@showVerificationForm')->name('media.verification');
    Route::post('/media/verification/{id}', 'MediaController@verification');

    Route::resource('scheme', 'SchemeController');

    Route::resource('template', 'TemplateController');
    Route::get('/template/preview/{id}', 'TemplateController@preview')->name('template.preview');
});

/*
 * Link
 */
Route::get('/link/league', "LinkController@league")->name('link.league');

/*
 * article
 */

Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
    Route::get('/', "ArticleController@index")->name('index');
    Route::get('/category/{id}', "ArticleController@articleCategoryShow")->name('category.show');
    Route::get('/{id}', "ArticleController@show")->name('show');

});
