<?php

use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
