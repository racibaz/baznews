<?php

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    /*
     * Biography
     * */
    Route::resource('biographies', 'Api\Biography\BiographyController', ['only' => ['index', 'show']]);
});

