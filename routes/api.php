<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::get('/login',"App\Http\Controllers\RegisterController@createLogin");
//Route::post('/login',"App\Http\Controllers\RegisterController@storeLogin");
//
//
//Route::get('/signup',"App\Http\Controllers\RegisterController@create");
//Route::post('/signup',"App\Http\Controllers\RegisterController@store");
//
//Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
//Route::get('/user',"App\Http\Controllers\UserController@index");

//Route::put('/user/{user}', "App\Http\Controllers\UserController@update");


//Route::put('/fichero/{fichero}',[\App\Http\Controllers\FicheroController::class,'update']);
Route::post('/project',"App\Http\Controllers\ProjectController@store");
Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");

Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");

Route::middleware('auth:sanctum')->group(function(){


//Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
//Route::put('/user/{user}', "App\Http\Controllers\UserController@update");

//Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
//Route::put('/user/{user}', "App\Http\Controllers\UserController@update");
//Route::delete('/user/{user}', "App\Http\Controllers\UserController@destroy");

//Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");
//Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");
//Route::delete('/project/{project}', "App\Http\Controllers\ProjectController@destroy");


//Route::put('/fichero/{fichero}',[\App\Http\Controllers\FicheroController::class,'update']);

});
