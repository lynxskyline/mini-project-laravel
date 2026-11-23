<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('barangs', BarangController::class);