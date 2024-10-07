<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('/', [StockController::class, 'getStock']);

Route::get('/json', [StockController::class, 'getCompanyTickers']);
