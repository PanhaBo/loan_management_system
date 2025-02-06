<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/homepage', [HomeController::class, 'index']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::get('/loan', [LoanController::class, 'loan'])->name('loan');

Route::get('/transaction', [TransactionController::class, 'transaction'])->name('transaction');

Route::get('/client', [ClientController::class, 'client'])->name('client');
