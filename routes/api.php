<?php

use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\TugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/buku', BukuController::class);
Route::resource('/users', UserController::class);
Route::resource('/materi', MateriController::class);
Route::resource('/tugas', TugasController::class);
