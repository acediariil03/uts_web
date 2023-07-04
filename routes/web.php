<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', [landingController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index'])->name('login.page');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
// Route::middleware('jwt.web')->group(function(){
//     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     Route::get('/getme', [DashboardController::class, 'getme'])->name('getme');
// });
Route::get('/login-page', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/table', [PortoController::class, 'index'])->name('table');
Route::post('/table', [PortoController::class, 'addPorto'])->name('porto.submit');
Route::post('/edit/{id}', [PortoController::class, 'updatePorto'])->name('porto.update');
Route::get('/delete/{id}', [PortoController::class, 'deletePorto'])->name('porto.delete');
