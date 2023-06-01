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



//Route::put('/fichero/{fichero}',[\App\Http\Controllers\FileController::class,'update']);


/*

Route::post('/project',"App\Http\Controllers\ProjectController@store");
Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");
Route::get('/project/',"App\Http\Controllers\ProjectController@index");

Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");
Route::delete('/project/{project}', "App\Http\Controllers\ProjectController@destroy");*/


Route::post('/login',"App\Http\Controllers\RegisterController@storeLogin");
Route::post('/signup',"App\Http\Controllers\RegisterController@store");
Route::post('/logout',"App\Http\Controllers\RegisterController@destroyLogin");
Route::get('/auth-google','App\Http\Controllers\GoogleAuthController@redirect');
Route::post('auth-google/call-back','App\Http\Controllers\GoogleAuthController@callBackGoogle');
Route::post('auth-google/token','App\Http\Controllers\GoogleAuthController@exchangeCode');
Route::get('/auth-github','App\Http\Controllers\GithubAuthController@redirect');
Route::post('auth-github/call-back','App\Http\Controllers\GithubAuthController@callBackGithub');

Route::get('/auth-linkedin','App\Http\Controllers\LinkedinAuthController@redirect');
Route::post('auth-linkedin/call-back','App\Http\Controllers\LinkedinAuthController@callBackLinkedin');


Route::get('/user', function (Request $request) {
    $user = $request->user();
    return dd($user);
})->middleware('auth:api');
/*
Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
Route::put('/user/{user}', "App\Http\Controllers\UserController@update");

Route::get('/user',"App\Http\Controllers\UserController@index");

Route::delete('/user/{user}', "App\Http\Controllers\UserController@destroy");*/

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/login', function () {
       return response(["UserType"=>"admin", "IndexPage"=>"/admin"  ]);  });

    Route::get('/user',"App\Http\Controllers\UserController@index");

});

Route::group([ 'middleware' => 'api'], function () {
    Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
    Route::get('/user',"App\Http\Controllers\UserController@index");
    Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
    Route::put('/user/{user}', "App\Http\Controllers\UserController@update");
    Route::delete('/user/{user}', "App\Http\Controllers\UserController@destroy");


    Route::post('/project',"App\Http\Controllers\ProjectController@store");
    Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");
    Route::get('/project',"App\Http\Controllers\ProjectController@index");

    Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");
    Route::delete('/project/{project}', "App\Http\Controllers\ProjectController@destroy");

    Route::post('/file',"App\Http\Controllers\FileController@store");
    Route::get('/file/{file}',"App\Http\Controllers\FileController@show");
    Route::get('/file',"App\Http\Controllers\FileController@index");

    Route::put('/file/{file}', "App\Http\Controllers\FileController@update");
    Route::delete('/file/{file}', "App\Http\Controllers\FileController@destroy");



});



/*
Route::middleware('auth:sanctum')->group(function(){
Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
Route::get('/user',"App\Http\Controllers\UserController@index");
Route::get('/user/{user}',"App\Http\Controllers\UserController@show");
Route::put('/user/{user}', "App\Http\Controllers\UserController@update");
Route::delete('/user/{user}', "App\Http\Controllers\UserController@destroy");


Route::post('/project',"App\Http\Controllers\ProjectController@store");
Route::get('/project/{project}',"App\Http\Controllers\ProjectController@show");
Route::put('/project/{project}', "App\Http\Controllers\ProjectController@update");
Route::delete('/project/{project}', "App\Http\Controllers\ProjectController@destroy");

    Route::post('/file',"App\Http\Controllers\FileController@store");
    Route::get('/file/{file}',"App\Http\Controllers\FileController@show");
    Route::get('/file/',"App\Http\Controllers\FileController@index");

    Route::put('/file/{file}', "App\Http\Controllers\FileController@update");
    Route::delete('/file/{file}', "App\Http\Controllers\FileController@destroy");

    Route::post('/logout',"App\Http\Controllers\RegisterController@destroyLogin");

Route::put('/fichero/{fichero}',[\App\Http\Controllers\FileController::class,'update']);

});*/
