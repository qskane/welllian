<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.',
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->group(['prefix' => 'resource'], function () {
        Route::resource('article-category', 'ArticleCategoryController');
        Route::resource('article', 'ArticleController');
        Route::resource('feedback', 'FeedbackController');
        Route::resource('media', 'MediaController');
        Route::resource('scheme', 'SchemeController');
        Route::resource('template', 'TemplateController');
        Route::resource('user', 'UserController');
        Route::resource('verification-code', 'VerificationCodeController');
        Route::resource('wallet', 'WalletController');
        Route::resource('wallet-log-category', 'WalletLogCategoryController');
    });

    $router->group(['prefix' => 'log'], function () {
        Route::resource('wallet-log', 'WalletLogController');
        Route::resource('league-log', 'LeagueLogController');
        Route::resource('league-api-log', 'LeagueApiLogController');
    });


});
