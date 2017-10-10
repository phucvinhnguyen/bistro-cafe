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

    Route::group(['prefix' => 'management', 'middleware' => 'can:access,App\Entities\Employee'], function () {

        Route::get('employees',['as' => 'employees.index','uses' => 'EmployeeController@index']);
        Route::get('employees/{id}/view',['as' => 'employees.profile','uses' => 'EmployeeController@profile']);
        Route::post('employees', ['as' => 'employees.store', 'uses' => 'EmployeeController@store']);
        Route::post('employees/{id}/edit', ['as' => 'employees.update', 'uses' => 'EmployeeController@update']);
    	Route::delete('employees', ['as' => 'employees.destroy', 'uses' => 'EmployeeController@destroy']);

        Route::get('foods', 'FoodController@index')->name('food.index');
    });

});

Auth::routes();
Route::post('/login', 'Auth\LoginController@authenticate')->name('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

