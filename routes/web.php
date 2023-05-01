<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PortoController;

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

Route::get('/', [landingController::class, 'index']);
Route::get('/login', [authController::class, 'index'])->name('login');
Route::get('/register', [authController::class, 'registerview'])->name('register');
Route::post('/login', [authController::class, 'login'])->name('login.submit');
Route::post('/register', [authController::class, 'register'])->name('register.submit');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/table', [PortoController::class, 'index'])->name('table');
Route::post('/table', [PortoController::class, 'addPorto'])->name('porto.submit');
Route::post('/edit/{id}', [PortoController::class, 'updatePorto'])->name('porto.update');
Route::get('/delete/{id}', [PortoController::class, 'deletePorto'])->name('porto.delete');
