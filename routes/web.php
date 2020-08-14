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
Route::post('/students/login', 'StudentController@login');
Route::post('/students/register', 'StudentController@register');
Route::post('/students/resueltas', 'StudentController@resueltas');
Route::post('/students/resueltasUpdate', 'StudentController@resueltasUpdate');
Route::post('/students/semanas', 'StudentController@semanas');
Route::post('/students/semanasUpdate', 'StudentController@semanasUpdate');
Route::resource('/students', 'StudentController')->middleware(("auth"));

Route::get('/information', function () {
    return view("information.index");
})->middleware(("auth"));

