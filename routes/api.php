<?php

use App\Http\Controllers\PortoController;
use App\Http\Controllers\API\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/table', [PortoController::class, 'getPorto']);
Route::post('/table', [PortoController::class, 'addPorto']);
Route::put('/edit/{id}', [PortoController::class, 'updatePorto']);
Route::delete('/delete/{id}', [PortoController::class, 'deletePorto']);

Route::controller(authController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(authController::class)->group(function () {
        Route::get('me', 'me');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});
