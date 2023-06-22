<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UrlController;
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
Route::get('/dashboard/create', [JadwalController::class, 'create']);
Route::post('/dashboard/create', [JadwalController::class, 'store']);

Route::get('/dashboard/code', [UrlController::class, 'create']);

