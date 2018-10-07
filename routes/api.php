<?php

Route::group(['namespace' => 'Api'], function () {
    Route::get('/media/{key}', 'MediaApi@show');
});
