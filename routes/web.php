<?php


Auth::routes();
Route::get('/', 'HomeController@index')->name('profile');
Route::get('/about', 'AboutController@index');
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/pricing','PricingController@index');
Route::get('/contact','ContactController@index');
Route::get('/exam','ExamController@index');
Route::get('/coba','CobaController@index');
Route::get('/dashboard','DashboardController@index');
Route::get('/resultreview', 'ResultController@index');
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
