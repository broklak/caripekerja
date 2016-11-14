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
Route::get('buat-lowongan', 'Employer\JobController@create')->name('job-create');
Route::post('job/store/', 'Employer\JobController@store');
Route::get('lowongan-kerja', 'Employer\JobController@index')->name('job-list');

// WORKER
Route::get('daftar-pekerja', 'HomeController@workerList')->name('worker-list');
Route::get('profil-pekerja/{workerId}', 'HomeController@workerDetail')->name('worker-detail');

