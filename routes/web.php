<?php

use App\Http\Controllers\AuthenticasiController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthenticationController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'loginStore'])->middleware('guest');

Route::get('/register', [AuthenticationController::class, 'registerView'])->middleware('guest');
Route::post('/register', [AuthenticationController::class, 'registerStore'])->middleware('guest');

Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/edit', [HomeController::class, 'edit'])->middleware('auth');
Route::put('/', [HomeController::class, 'update'])->middleware('auth');
Route::post('/', [HomeController::class, 'store'])->middleware('auth');
Route::delete('/', [HomeController::class, 'delete'])->middleware('auth');
