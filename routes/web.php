<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index', 'home')->name('home');
Route::get('/home', 'HomeController@index');

// AUTHENTICATION
Auth::routes();
Route::get('/keluar', 'Auth\LoginController@logout')->name('logout');
Route::get('/masuk', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/daftar', 'Auth\RegisterController@showRegistrationForm')->name('register');


//Employer Login
Route::get('employer/login', 'EmployerAuth\LoginController@showLoginForm');
Route::post('employer/login', 'EmployerAuth\LoginController@login');
Route::post('employer/logout', 'EmployerAuth\LoginController@logout');

//Employer Register
Route::get('employer/register', 'EmployerAuth\RegisterController@showRegistrationForm');
Route::post('employer/register', 'EmployerAuth\RegisterController@register');

//Employer Passwords
Route::post('employer/password/email', 'EmployerAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('employer/password/reset', 'EmployerAuth\ResetPasswordController@reset');
Route::get('employer/password/reset', 'EmployerAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('employer/password/reset/{token}', 'EmployerAuth\ResetPasswordController@showResetForm');

// JOB
Route::get('buat-lowongan', 'JobController@create')->name('job-create');
Route::post('job/store/', 'JobController@store');
Route::get('lowongan-kerja', 'JobController@index')->name('job-list');
Route::get('lamar-kerja/{jobId}', 'UserController@applyJob')->name('job-apply');

// WORKER
Route::get('daftar-pekerja', 'HomeController@workerList')->name('worker-list');
Route::post('daftar-pekerja', 'HomeController@workerList')->name('worker-list');
Route::get('profil-pekerja/{workerId}', 'HomeController@workerDetail')->name('worker-detail');

// MYACCOUNT
Route::get('akun-saya', 'UserController@myAccount')->name('myaccount-index');
Route::get('profil-saya', 'UserController@myProfile')->name('myaccount-profile');
Route::post('update-profile', 'UserController@update');
Route::post('add-exp', 'UserController@addExperience');
Route::post('add-skill', 'UserController@addSkill');

//PAYMENT
Route::get('topup', 'PaymentController@index')->name('topup-create');
Route::get('konfirmasi-bayar', 'PaymentController@confirmTopup')->name('topup-confirm');
Route::get('approve-topup', 'PaymentController@approvePayment')->name('topup-approve');
Route::get('kontak-pekerja/{workerId}', 'PaymentController@contactWorker')->name('contact-worker');
Route::get('topup-selesai/{topupId}', 'PaymentController@topupFinished')->name('topup-finished');
Route::post('topup-process', 'PaymentController@processTopup');
Route::post('confirm-topup', 'PaymentController@processConfirmTopup');
Route::post('approve-process', 'PaymentController@processApproveTopup');

