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



Route::group(['prefix' => 'bistrocp'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('employees', 'EmployeeController@index')->name('employees.index');
    Route::resource('employees', 'EmployeeController');
	Route::delete('employees', ['as' => 'employees.destroy', 'uses' => 'EmployeeController@destroy']);

    Route::get('auth/login', 'EmployeeController@login');
    Route::post('auth/login', 'EmployeeController@authenticate')->name('employees.auth');
    Route::get('auth/logout', 'EmployeeController@logout')->name('employees.auth');

});

Auth::routes();


