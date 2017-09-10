<?php

Auth::routes();

Route::get('/', 'DashboardController@index')->name('profile');
Route::get('/about', 'GeneralPagesController@about');
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/send','MailCOntroller@send');
Route::get('/pricing','PricingController@index');
Route::get('/hasil','HasilController@index');
Route::get('/contact','GeneralPagesController@getContact');
Route::post('/contact', ['as'=>'contactus.store','uses'=>'GeneralPagesController@postContact']);
Route::get('/exam','ExamController@index');
Route::get('/dashboard','DashboardController@index');
Route::get('/start','StartAttemptController@index');
Route::get('/end','EndAttemptController@index');
Route::get('/result/{examid}', 'ResultController@getResult');
Route::get('/hasil/{examid}', 'ResultController@getHasil');

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

Route::get('/vtweb', 'PaymentController@vtweb');

Route::get('/vtdirect', 'PaymentController@vtdirect');
Route::post('/vtdirect', 'PaymentController@checkout_process');

Route::get('/vt_transaction', 'PaymentController@transaction');
Route::post('/vt_transaction', 'PaymentController@transaction_process');

Route::post('/vt_notif', 'PaymentController@notification');

Route::get('/snap', 'SnapController@snap');
Route::get('/snaptoken', 'SnapController@token');
Route::post('/snapfinish', 'SnapController@finish');

Route::post('/takenexam', 'ExamController@takenExam'); 
Route::post('/closeexam', 'ExamController@closeExam'); 
