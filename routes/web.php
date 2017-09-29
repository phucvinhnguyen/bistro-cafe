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

define('SUPER_ADMIN', 'admin');
define('CP_PERMISSION', 'admin,manager');
define('EDIT_PROFILE', 'admin,manager,staff');

Route::group(['prefix' => 'bistrocp', 'middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/employees',['as' => 'employees.index','uses' => 'EmployeeController@index', 'middleware' => 'role:'.CP_PERMISSION]);
    Route::get('/employees/{id}/profile',['as' => 'employees.profile','uses' => 'EmployeeController@profile', 'middleware' => 'role:'.EDIT_PROFILE]);
    Route::post('/employees', ['as' => 'employees.store', 'uses' => 'EmployeeController@store', 'middleware' => 'role:'.CP_PERMISSION]);
    Route::post('/employees/{id}/profile', ['as' => 'employees.update', 'uses' => 'EmployeeController@update', 'middleware' => 'role:'.EDIT_PROFILE]);
	Route::delete('/employees', ['as' => 'employees.destroy', 'uses' => 'EmployeeController@destroy', 'middleware' => 'role:'.SUPER_ADMIN]);

});

Auth::routes();
Route::post('/login', 'Auth\LoginController@authenticate')->name('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

