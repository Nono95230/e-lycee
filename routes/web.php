<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is register web routes for your public application.
|
*/
Route::get('/', 'FrontController@index')->name('home');

Route::get('actualites', 'FrontController@actus')->name('actus');
Route::get('actualite/{id}', 'FrontController@OneActu')->name('actu');
Route::get('le-lycee', 'FrontController@presentationLycee')->name('le-lycee');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::get('mentions-legales', 'FrontController@mentionsLegales')->name('mentions-legales');
Route::any('login', 'Login\LoginController@login')->name('login');
Route::get('logout','Login\LoginController@logout')->name('logout');
/*
|--------------------------------------------------------------------------
| Private Routes
|--------------------------------------------------------------------------
|
| Here is register web routes for your private application.
|
*/



Route::group(['middleware' => 'auth'], function(){

	Route::get('member/dashboard', 'Member\DashboardController@index')->name('dashboard');
    Route::post('member/post/{id}/status', 'Member\PostController@updateStatus')->name('post.status.update');
    Route::resource('member/post', 'Member\PostController' );
    
    Route::resource('member/qcm', 'Member\QcmController' );
    Route::post('member/qcm/{id}/status', 'Member\QcmController@updateStatus')->name('qcm.status.update');

    Route::resource('member/question', 'Member\QuestionController' );
});