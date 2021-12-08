<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'middleware' => [ 'speaks-tongue' ]], function() {

	Route::get('/', 'Codes\Controller\CodesController@index');
	Route::post('/enter-code', 'Questions\Controller\QuestionsController@start')->name('start');
	Route::get('/questions/{step}', 'Questions\Controller\QuestionsController@index')->name('questions');
	Route::post('/questions/{step}', 'Questions\Controller\QuestionsController@index')->name('questions');
	Route::get('/finish', 'Finish\Controller\FinishController@index')->name('finish');
	
	Route::get('/admin-login', 'Admin\AdminController@login')->name('login');
	Route::post('/admin-login', 'Admin\AdminController@login')->name('login');
	Route::get('/confirm-email', 'Admin\AdminController@confirm')->name('confirm')->middleware('check-user');
	Route::get('/confirm/{token}', 'Admin\AdminController@confirmToken')->name('confirm-token');
	Route::get('/invalid-token', 'Admin\AdminController@invalidToken')->name('invalid-token');
	
	
	Route::group([ 'middleware' => [ 'is-logged' ]], function() { 

		Route::group([ 'middleware' => [ 'is-admin' ]], function() { 

			Route::get('/admin', 'Admin\AdminController@admin')->name('admin');
			Route::post('/admin', 'Admin\AdminController@store')->name('admin');
			Route::post('/search', 'Admin\AdminController@admin')->name('search');
			Route::get('/getSchools/{id}', 'Admin\AdminController@schools')->name('schools');
			Route::post('/remove-user/{id}', 'Admin\AdminController@removeUser')->name('remove-user');
		});
		Route::get('/generate', 'Admin\AdminController@generate')->name('generate');
		Route::get('/staff-content', 'Admin\AdminController@students')->name('students');
		Route::post('/staff-content', 'Admin\AdminController@students')->name('students');
		Route::get('/staff-content-res/{id}', 'Admin\AdminController@studentsRes')->name('students-res');
		Route::get('/staff-content-res/answers/{id}', 'Admin\AdminController@answers')->name('answers');
		Route::post('/enter-name/{id}', 'Admin\AdminController@enterName')->name('enter-name');
		Route::get('/logout', 'Admin\AdminController@logout')->name('logout');
	});

});