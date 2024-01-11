<?php

use App\Http\Controllers\Auth\AccessController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], static function () {
    //Sign up
    Route::post('sign-up', [AuthController::class, 'store']);

    // Login
    Route::post('access', [AccessController::class, 'store']);

    Route::group(['middleware' => [
        'auth:sanctum',
    ]], static function () {
        // Logout
        Route::delete('access', [AccessController::class, 'destroy']);
    });
});

Route::group(['middleware' => [
    'auth:sanctum',
]], static function () {
    Route::apiResource('groups', GroupController::class);
    Route::apiResource('messages', MessageController::class);
});
