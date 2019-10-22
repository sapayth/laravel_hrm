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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'BaseController@index');
Route::get('/admin', 'BaseController@index');
Route::get('/admin/departments', 'DepartmentsController@index')->name('departments.index');
Route::get('/admin/departments/create', 'DepartmentsController@create')->name('departments.create');
Route::post('/admin/departments/create', 'DepartmentsController@store')->name('departments.store');
Route::post('/admin/departments/destroy', 'DepartmentsController@destroy')->name('departments.destroy');
Route::get('/admin/departments/{department}/edit', 'DepartmentsController@edit')->name('departments.edit');
Route::get('/admin/departments/editing', 'DepartmentsController@editing_data')->name('departments.editing_data');
Route::post('/admin/departments/update', 'DepartmentsController@update')->name('departments.update');

Route::post('/admin/employees/change_designations', 'EmployeesController@change_designations');

Route::get('/admin/employees', 'EmployeesController@index')->name('employees.index');
Route::get('/admin/employees/create', 'EmployeesController@create')->name('employees.create');
Route::post('/admin/employees/create', 'EmployeesController@store')->name('employees.store');
Route::get('/admin/employees/{employee}/edit', 'EmployeesController@edit')->name('employees.edit');
Route::post('/admin/employees/destroy/{employee}', 'EmployeesController@destroy')->name('employees.destroy');

Route::get('/admin/calendars', 'CalendarsController@index')->name('calendars.index');
Route::get('/admin/calendars/create', 'CalendarsController@create')->name('calendars.create');
Route::post('/admin/calendars/create', 'CalendarsController@store')->name('calendars.store');
