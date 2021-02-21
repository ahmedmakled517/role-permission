<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("dashboard")->middleware('auth')->name("dashboard.")->group(function(){
    Route::get('/index', "Dashboard\DashboardController@index")->name("index");

    Route::resource("groups", "Dashboard\GroupsController");

    Route::resource("users","Dashboard\UsersController");

    Route::resource('/powers', "Dashboard\PowerController");

    Route::get('/first', ['middleware' => ['permission:first-users'], 'uses' => "Dashboard\DashboardController@first"])->name("first");
  

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
