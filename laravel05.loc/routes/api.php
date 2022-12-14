<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ConverterController;
use App\Http\Controllers\Api\UserController;
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
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::apiResource('/categories', CategoryController::class);
Route::get('/converter', [ConverterController::class, 'index'])->name('converter');

Route::middleware('/auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

