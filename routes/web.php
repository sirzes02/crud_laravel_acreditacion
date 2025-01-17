<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');
Route::resource('/roles', 'RoleController');
Route::resource('/questions', 'QuestionController');
Route::resource('/students', 'StudentController');

Route::get('/information', function () {
    return view("information.index");
})->middleware(("auth"));
