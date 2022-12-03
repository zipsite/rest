<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/user', 'UserController@showAllUser');
Route::get('/user/{id}', "UserController@showUser");
Route::post('/user', 'UserController@createUser');
Route::put('/user', "UserController@updateUser");
Route::delete('/user/{id}', 'UserController@deleteUser');