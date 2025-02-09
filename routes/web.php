<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoanListController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\PaymentController;
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

Route::resource('payments', PaymentController::class);
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::resource('loan_list', LoanListController::class);

// Route::get('/loan', [LoanController::class, 'loan'])->name('loan');

Route::resource('loan_type', LoanTypeController::class);
Route::get('/loan_type', [LoanTypeController::class, 'index'])->name('loan_type.index');
Route::get('/loan_type/create', [LoanTypeController::class, 'create'])->name('loan_type.create');
Route::post('/loan_type', [LoanTypeController::class, 'store'])->name('loan_type.store');
Route::get('/loan_type/{id}/edit', [LoanTypeController::class, 'edit'])->name('loan_type.edit');
Route::put('/loan_type/{id}', [LoanTypeController::class, 'update'])->name('loan_type.update');
Route::delete('/loan_type/{id}', [LoanTypeController::class, 'destroy'])->name('loan_type.destroy');

Route::resource('loan_plan', LoanPlanController::class);


Route::get('/borrowers', [BorrowerController::class, 'index'])->name('borrowers.index');
Route::get('/borrowers/{id}/edit', [BorrowerController::class, 'edit'])->name('borrowers.edit');
Route::post('/borrowers/{id}/update', [BorrowerController::class, 'update'])->name('borrowers.update');
Route::delete('/borrowers/{id}', [BorrowerController::class, 'destroy'])->name('borrowers.destroy');
Route::get('/borrowers/create', [BorrowerController::class, 'create'])->name('borrowers.create');
Route::post('/borrowers', [BorrowerController::class, 'store'])->name('borrowers.store');



Route::get('/client', [ClientController::class, 'client'])->name('client');
