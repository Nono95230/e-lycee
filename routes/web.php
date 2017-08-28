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
Route::match(['post','from'],'contact/send', 'FrontController@sendContactMessage')->name('contact.send');
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

	Route::get('teacher/dashboard', 'Teacher\DashboardController@index')->name('dashboard');
    
    Route::post('teacher/post/{id}/status', 'Teacher\PostController@updateStatus')->name('post.status.update');
    Route::resource('teacher/post', 'Teacher\PostController' );
    
    Route::resource('teacher/qcm', 'Teacher\QcmController' );
    Route::post('teacher/qcm/{id}/status', 'Teacher\QcmController@updateStatus')->name('qcm.status.update');

    Route::match(['get', 'head'], 'teacher/question/create','Teacher\QuestionController@create')->name('question.create');
    Route::post('teacher/question', 'Teacher\QuestionController@store')->name('question.store');
    Route::match(['get', 'head'], 'teacher/question/{question}/edit','Teacher\QuestionController@edit')->name('question.edit');
    Route::match(['put', 'patch'], 'teacher/question/{question}','Teacher\QuestionController@update')->name('question.update');
    Route::get('teacher/question/add','Teacher\QuestionController@addQuestion')->name('question.add.new');
    Route::get('teacher/question/remove','Teacher\QuestionController@removeQuestion')->name('question.remove.last');
    
    Route::get('student/dashboard', 'Student\StudentController@index')->name('student.dashboard');
    Route::get('student/qcm', 'Student\StudentController@qcmIndex')->name('student.qcm.index');
    Route::get('student/qcm/make/{qcm}', 'Student\StudentController@qcmMake')->name('student.qcm.make');
    //Route::post('student/qcm', 'Student\StudentController@qcmIndex')->name('student.qcm.make');
    
});