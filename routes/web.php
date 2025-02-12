<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StockController::class, 'getAllDashboardValue'])->name('welcome');

Route::get('/todo', [StockController::class, 'createTodoTaskInputs'])->name('todo.create');
Route::post('/todo', [StockController::class, 'storeTodoTaskInputs'])->name('todo.store');
