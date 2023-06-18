<?php

use App\Http\Controllers\PortoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/table',[PortoController::class, 'getPorto']);
Route::post('/table',[PortoController::class, 'addPorto']);
Route::put('/edit/{id}',[PortoController::class, 'updatePorto']);
Route::delete('/delete/{id}',[PortoController::class, 'deletePorto']);
