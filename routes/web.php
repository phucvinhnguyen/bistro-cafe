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








Route::group(['prefix' => 'bistrocp', 'middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('employees', 'EmployeeController@index')->name('employees.index');
    Route::post('employees', ['as' => 'employees.store', 'uses' => 'EmployeeController@store']);
	Route::delete('employees', ['as' => 'employees.destroy', 'uses' => 'EmployeeController@destroy']);
});

Auth::routes();
Route::post('/login', 'Auth\LoginController@authenticate')->name('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

