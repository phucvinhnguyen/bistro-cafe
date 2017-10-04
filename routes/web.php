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

    Route::group(['prefix' => 'employees', 'middleware' => 'can:access,App\Entities\Employee'], function () {

        Route::get('/',['as' => 'employees.index','uses' => 'EmployeeController@index']);
        Route::get('/{id}/view',['as' => 'employees.profile','uses' => 'EmployeeController@profile']);
        Route::post('/', ['as' => 'employees.store', 'uses' => 'EmployeeController@store']);
        Route::post('/{id}/edit', ['as' => 'employees.update', 'uses' => 'EmployeeController@update']);
    	Route::delete('/', ['as' => 'employees.destroy', 'uses' => 'EmployeeController@destroy']);

    });
});

Auth::routes();
Route::post('/login', 'Auth\LoginController@authenticate')->name('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

