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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'API\UserController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('employee', 'EmployeeController@addForm')->name('index');
Route::post('import', 'EmployeeController@import')->name('import');

//Routes for list 
Route::get('list', 'EmployeeController@index')->name('list');
Route::get('list/{sort}', 'EmployeeController@index')->name('list');
Route::get('deletelistitem/{id}', 'EmployeeController@destroy')->name('deletelistitem');
Route::get('editlistitem/{id}', 'EmployeeController@edit')->name('editlistitem');
Route::post('listupdate', 'EmployeeController@update')->name('listupdate');


