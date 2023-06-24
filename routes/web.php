<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
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

Route::get('/a', function () {
    return view('jadwal/video');
});

Route::get('/', [JadwalController::class, 'index']);
Route::get('/video', [JadwalController::class, 'show']);


Route::get('/login', [UserController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/dashboard/create', [JadwalController::class, 'create']);
    Route::post('/dashboard/create', [JadwalController::class, 'store']);
    Route::get('/dashboard/edit/{id}', [JadwalController::class, 'edit']);
    Route::post('/dashboard/edit/{jadwal}', [JadwalController::class, 'update']);

    Route::get('/dashboard/code', [UrlController::class, 'create']);
    Route::post('/dashboard/code', [UrlController::class, 'store']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::delete('/dashboard/jadwal/{id}', [DashboardController::class, 'destroy']);
    Route::delete('/dashboard/code/{id}', [DashboardController::class, 'destroyCode']);
});
