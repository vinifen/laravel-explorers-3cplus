<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\AuthExplorerController;

Route::apiResource('explorers', ExplorerController::class);

Route::post('/register', [AuthExplorerController::class, 'register'])->name('register');
Route::post('/login', [AuthExplorerController::class, 'login'])->name('login');

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
