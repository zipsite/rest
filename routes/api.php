<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/user', 'UserController@showAllUser');
Route::get('/user/{id}', "UserController@showUser");
Route::post('/user', 'UserController@createUser');
Route::put('/user', "UserController@updateUser");
Route::delete('/user/{id}', 'UserController@deleteUser');

Route::get('/type', 'TypeAccessController@showAllType');
Route::get('/type/{id}', "TypeAccessController@showType");
Route::post('/type', 'TypeAccessController@createType');
Route::put('/type', "TypeAccessController@updateType");
Route::delete('/type/{id}', 'TypeAccessController@deleteType');

Route::get('/user/{user_id}/access', 'AccessController@showAllAccess');
Route::get('/user/{user_id}/access/{id}', "AccessController@showAccess");
Route::post('/user/{user_id}/access', 'AccessController@createAccess');
Route::put('/user/{user_id}/access', "AccessController@updateAccess");
Route::delete('/user/{user_id}/access/{id}', 'AccessController@deleteAccess');