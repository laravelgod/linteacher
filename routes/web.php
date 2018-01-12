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

// teachers-related route
Route::get('/teachers/quit', 'TeachersController@quit')
    ->name('teachers.quit');

Route::get('/teachers', 'TeachersController@index')
    ->name('teachers.index');


Route::get('/teachers/{id}', 'TeachersController@show')
    ->where('id', '[0-9]+')
    ->name('teachers.show');

Route::get('/teachers/create', 'TeachersController@create')
    ->name('teachers.create');

Route::patch('/teachers/{id}', 'TeachersController@update')
    ->where('id', '[0-9]+')
    ->name('teachers.update');

Route::post('/teachers', 'TeachersController@store')
    ->where('id', '[0-9]+')
    ->name('teachers.store');


Route::get('/teachers/{id}/edit', 'TeachersController@edit')
    ->where('id', '[0-9]+')
    ->name('teachers.edit');

Route::get('/teachers/{id}/delete', 'TeachersController@destroy')
    ->where('id', '[0-9]+')
    ->name('teachers.destroy');

Route::get('/teachers/{id}/restore', 'TeachersController@restore')
    ->where('id', '[0-9]+')
    ->name('teachers.restore');


// students-related route
Route::get('/students/quit', 'StudentsController@quit')
    ->name('students.quit');

Route::get('/students', 'StudentsController@index')
    ->name('students.index');

Route::get('/students/create', 'StudentsController@create')
    ->name('students.create');

Route::patch('/students/{id}', 'StudentsController@update')
    ->where('id', '[0-9]+')
    ->name('students.update');

Route::post('/students', 'StudentsController@store')
    ->where('id', '[0-9]+')
    ->name('students.store');

Route::get('/students/{id}/edit', 'StudentsController@edit')
    ->where('id', '[0-9]+')
    ->name('students.edit');

Route::get('/students/{id}/delete', 'StudentsController@destroy')
    ->where('id', '[0-9]+')
    ->name('students.destroy');

Route::get('/students/{id}/restore', 'StudentsController@restore')
    ->where('id', '[0-9]+')
    ->name('students.restore');


/*
Route::group(['as' => 'teachers.', 'prefix' => 'teachers'], function () {
    // url: /teacher/
    Route::get('/', 'TeachersController@index');

    // url: /teacher/45
    Route::get('/{id}', 'TeachersController@show')
        ->where('id', '[0-9]+')
        ->name('show');

    // url: /teacher/create
    Route::get('/create', 'TeachersController@create')
        ->name('create');

    // url: /teacher/store
    Route::post('/store', 'TeachersController@store');
});
*/