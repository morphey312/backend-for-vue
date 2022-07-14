<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoItemController;

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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthenticationController::class, 'user']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('/todo', [TodoItemController::class, 'index']);
    Route::post('/todo', [TodoItemController::class, 'store']);
    Route::patch('/todo/{todoItem}', [TodoItemController::class, 'update']);
    Route::delete('/todo/{todoItem}', [TodoItemController::class, 'destroy']);
    Route::post('/file', [TodoItemController::class, 'storeFile']);
});
