<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StockController::class, 'getAllDashboardValue'])->name('welcome');

Route::get('/todo', [StockController::class, 'createTodoTaskInputs'])->name('todo.create');
Route::post('/todo', [StockController::class, 'storeTodoTaskInputs'])->name('todo.store');
Route::get('/todo/{id}/edit', [StockController::class, 'editTodoTask'])->name('todo.edit');
Route::put('/todo/{id}', [StockController::class, 'updateTodoTask'])->name('todo.update');
Route::delete('/todo/{id}', [StockController::class, 'deleteTodoTask'])->name('todo.delete');

