<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
    return view('index');
});


//Route::get('/login',"App\Http\Controllers\RegisterController@createLogin");

Route::get('/login',function (){
    return view('login');
});
/************************************************************************/
Route::get('/login',"App\Http\Controllers\RegisterController@createLogin");
Route::post('/login',"App\Http\Controllers\RegisterController@storeLogin");

/************************************************************************/
Route::get('/signup',"App\Http\Controllers\RegisterController@create");
Route::post('/signup',"App\Http\Controllers\RegisterController@store");

/************************************************************************/
Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
Route::get('/user',"App\Http\Controllers\UserController@index");

Route::put('/user/{user}', "App\Http\Controllers\UserController@update");
Route::delete('/user/{user}', "App\Http\Controllers\UserController@destroy");

/************************************************************************/

Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");
Route::get('/project',"App\Http\Controllers\ProjectController@index");

Route::post('/project',"App\Http\Controllers\ProjectController@store");
Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");
Route::delete('/project/{project}', "App\Http\Controllers\ProjectController@destroy");

