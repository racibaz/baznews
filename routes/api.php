<?php

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {

    /*
     * User
     * */
    Route::resource('users', 'Api\User\UserController', ['only' => ['index', 'show']]);

    /*
     * Country
     * */
    Route::resource('countries', 'Api\Country\CountryController', ['only' => ['index', 'show']]);
    Route::resource('countries.cities', 'Api\Country\CountryCityController', ['only' => ['index']]);

    /*
     * City
     * */
    Route::resource('cities', 'Api\City\CityController', ['only' => ['index', 'show']]);

    /*
     * Page
     * */
    Route::resource('pages', 'Api\Page\PageController', ['only' => ['index', 'show']]);
    Route::resource('pages.menus', 'Api\Page\PageMenuController', ['only' => ['index']]);

    /*
     * Menu
     * */
    Route::resource('menus', 'Api\Menu\MenuController', ['only' => ['index', 'show']]);

});