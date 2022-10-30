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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'products'], function () {
          Route::post('create', [App\Http\Controllers\Product\CreateController::class,'create']);
          Route::get('read/{id}', [App\Http\Controllers\Product\ReadController::class,'read']);
          Route::post('update/{id}', [App\Http\Controllers\Product\UpdateController::class,'update']);
          Route::delete('delete/{id}', [App\Http\Controllers\Product\DeleteController::class,'delete']);
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'variants'], function () {
          Route::post('create', [App\Http\Controllers\Variant\CreateController::class,'create']);
          Route::get('read/{id}', [App\Http\Controllers\Variant\ReadController::class,'read']);
          Route::post('update/{id}', [App\Http\Controllers\Variant\UpdateController::class,'update']);
          Route::delete('delete/{id}', [App\Http\Controllers\Variant\DeleteController::class,'delete']);
    });
});