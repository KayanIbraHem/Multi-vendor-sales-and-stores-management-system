<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Authentication\LogoutController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return 'test';
});


Route::post('auth/login', [LoginController::class, 'login']);
Route::post('auth/logout', [LogoutController::class, 'logout']);

//Unit
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('units', UnitController::class);
});
