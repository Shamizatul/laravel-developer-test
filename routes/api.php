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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/all', [UserController::class, 'index']); // To get all users
Route::post('/users/add', [UserController::class, 'store']); // To create a new user
Route::get('/users/{id}', [UserController::class, 'show']); // To get a specific user
Route::put('/users/edit/{id}', [UserController::class, 'update']); // To update a user
Route::delete('/users/delete/{id}', [UserController::class, 'delete']); // To delete a user