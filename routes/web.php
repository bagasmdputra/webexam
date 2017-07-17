<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/about', 'AboutController@index');
Route::get('/home', 'HomeController@index');
Route::get('/pricing','PricingController@index');
Route::get('/contact','ContactController@index');
Route::get('/exam','ExamController@index');
Route::get('/dashboard','DashboardController@index');
Route::get('/resultreview', 'ResultController@index');
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
