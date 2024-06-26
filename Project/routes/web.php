<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;

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

// Route::get('/', function () {
//     return view('master');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//data jurusan
Route::get('/jurusan/', [JurusanController::class, 'index'])->middleware('auth');
Route::get('/jurusan/form/', [JurusanController::class, 'create'])->middleware('auth');
Route::post('/jurusan/store/', [JurusanController::class, 'store'])->middleware('auth');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->middleware('auth');
Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->middleware('auth');
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->middleware('auth');

//data Mahasiswa
Route::get('/Mahasiswa/', [MahasiswaController::class, 'index'])->middleware('auth');
Route::get('/Mahasiswa/form/', [MahasiswaController::class, 'create'])->middleware('auth');
Route::post('/Mahasiswa/store/', [MahasiswaController::class, 'store'])->middleware('auth');
Route::get('/Mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->middleware('auth');
Route::put('/Mahasiswa/{id}', [MahasiswaController::class, 'update'])->middleware('auth');
Route::delete('/Mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->middleware('auth');
Route::get('/Mahasiswa/detail/{id}', [MahasiswaController::class, 'detail'])->middleware('auth');
