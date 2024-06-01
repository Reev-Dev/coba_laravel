<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/item', [App\Http\Controllers\HomeController::class, 'item']);

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/kategori-create', 'create')->name('kategori.create');
    Route::post('/kategori', 'store')->name('kategori.perform');
    Route::get('/kategori-edit/{id}', 'edit')->name('kategori.edit');
    Route::put('/kategori-edit/{id}', 'update')->name('kategori.update');
    Route::delete('kategori/{id}', 'destroy')->name('kategori.delete');
});

Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa');
    Route::get('/siswa-create', 'create')->name('siswa.create');
    Route::post('/siswa', 'store')->name('siswa.perform');
    Route::get('/siswa-edit/{id}', 'edit')->name('siswa.edit');
    Route::put('/siswa-edit/{id}', 'update')->name('siswa.update');
    Route::delete('siswa/{id}', 'destroy')->name('siswa.delete');
});
