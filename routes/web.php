<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('profile');
Route::get('/about', 'GeneralPagesController@about');
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/pricing','PricingController@index');
Route::get('/contact','GeneralPagesController@contact');
Route::get('/exam','ExamController@index');
Route::get('/dashboard','DashboardController@index');
Route::get('/result/{examid}', 'ResultController@getResult');
Route::get('/hasil','HasilController@index');

Route::get('/verifyemail/{token}','Auth\RegisterController@verify');
// Route::prefix('admin')->group(function(){
//   Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//   Route::get('/', 'AdminController@index')->name('admin.dashboard');
//   Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/exam/{url}/{id}', [
  'as' => 'getQuest', 'uses' => 'ExamController@getQuest'
]);
Route::get('/exam/{url}', 'ExamController@getExam');
Route::get('/exam/history', 'ExamController@getHistory');
Route::post('/exam', 'ExamController@saveAnswer');
