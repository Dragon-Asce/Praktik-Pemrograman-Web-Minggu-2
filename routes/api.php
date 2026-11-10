<?php

use App\Http\Controllers\API\MahasiswaAPIController;
use App\Http\Controllers\API\MatakuliahAPIController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('mahasiswaAPI', MahasiswaAPIController::class)->only(['index', 'show']);
    Route::apiResource('matakuliahAPI', MatakuliahAPIController::class)->only(['index', 'show']);
});
