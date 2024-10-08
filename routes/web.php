<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('/', [StockController::class, 'getStock'])->name('dashboard');;
Route::get('/json', [StockController::class, 'getCompanyTickers']);
Route::post('/image', [StockController::class, 'imageStore']);
Route::get('/image', [StockController::class, 'imageview']);

