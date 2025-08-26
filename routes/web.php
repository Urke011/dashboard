<?php
use App\Http\Controllers\OcrController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::post('/reset-cache', [CacheController::class, 'resetCache'])->name('reset.cache');
Route::get('/', [StockController::class, 'getAllDashboardValue'])->name('welcome');
//todo
Route::get('/todo', [StockController::class, 'createTodoTaskInputs'])->name('todo.create');
Route::post('/todo', [StockController::class, 'storeTodoTaskInputs'])->name('todo.store');
Route::get('/todo/{id}/edit', [StockController::class, 'editTodoTask'])->name('todo.edit');
Route::put('/todo/{id}', [StockController::class, 'updateTodoTask'])->name('todo.update');
Route::delete('/todo/{id}', [StockController::class, 'deleteTodoTask'])->name('todo.delete');
//ocr
Route::get('/ocr-upload', [OcrController::class, 'showForm'])->name('ocr.form');
Route::post('/ocr-upload', [OcrController::class, 'processImage'])->name('ocr.process');
//receipt
Route::post('/receipt-step1', [ReceiptController::class, 'step1'])->name('receipt.step1');
Route::get('/receipt-step2', [ReceiptController::class, 'step2'])->name('receipt.step2');
Route::post('/receipt-store', [ReceiptController::class, 'store'])->name('receipt.store');

Route::get('/test', [ReceiptController::class, 'showWeekendSpending'])->name('test');

Route::get('/email-form', [MailController::class, 'showForm']);
Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send-mail');
