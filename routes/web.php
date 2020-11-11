<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MahasiswaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PegawaiController::class,'index'])->name('home');
Route::get('/tambah', [PegawaiController::class,'tambah'])->name('tambah');
Route::post('/store', [PegawaiController::class,'store'])->name('store');
Route::get('/edit/{id}', [PegawaiController::class,'edit'])->name('edit');
Route::post('/update/{id}', [PegawaiController::class,'update'])->name('update');
Route::get('/delete/{id}', [PegawaiController::class,'delete'])->name('delete');

Route::get('mahasiswa/', [MahasiswaController::class,'index'])->name('mahasiswa');
Route::get('mahasiswa/tambah', [MahasiswaController::class,'create'])->name('mahasiswa-create');
Route::post('mahasiswa/store', [MahasiswaController::class,'store'])->name('mahasiswa-store');
Route::get('mahasiswa/edit/{mahasiswa}', [MahasiswaController::class,'edit'])->name('mahasiswa-edit');
Route::post('mahasiswa/update/{mahasiswa}', [MahasiswaController::class,'update'])->name('mahasiswa-update');
Route::get('mahasiswa/delete/{mahasiswa}', [MahasiswaController::class,'destroy'])->name('mahasiswa-delete');
Route::get('mahasiswa/search/', [MahasiswaController::class,'search'])->name('mahasiswa-search');