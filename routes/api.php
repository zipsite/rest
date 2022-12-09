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

Route::apiResource('/client', 'ClientController');
Route::apiResource('/type', 'AccessTypeController');
Route::apiResource('/sample', 'AccessSampleController');
Route::apiResource('/client/{client}/access', 'AccessController');