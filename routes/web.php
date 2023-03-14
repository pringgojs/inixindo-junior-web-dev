<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('users/{id}/delete', [UserController::class, 'destroy']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::get('users/form', [UserController::class, 'form']);
Route::post('users', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'index']);