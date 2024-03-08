<?php

use App\Http\Controllers\SisController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('tampil', [SiswaController::class, 'index']);
// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('tambah', [SiswaController::class, 'create']);
// Route::get('Edit', [SiswaController::class, 'create']);

Route::resource('siswa', SiswaController::class);