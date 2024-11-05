<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BillingController;


Route::get('/', function () {
    return view('auth/login');
});



Route::get('auth/login', [LoginController::class, 'index'])->name('account.login');
Route::get('auth/register', [RegisterController::class, 'register'])->name('account.register');

Route::post('auth/process-register', [RegisterController::class, 'processRegister'])->name('account.processRegister');

Route::post('auth/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

Route::get('auth/logout', [LoginController::class, 'logout'])->name('account.logout');


Route::get('/dashboard', [DashboardController::class, 'indexdashboard'])->name('account.dashboard');
Route::get('/dashboard', [DashboardController::class, 'showUsers'])->name('account.dashboard');
// Route::get('/dashboard', [DashboardController::class, 'getUserById'])->name('account.dashboard');
// Route::get('/usermanagement', [DashboardController::class, 'getAllUsers'])->name('account.getAllUsers');
Route::get('auth/accountuser', [AccountController::class, 'getAllUsers'])->name('account.accountuser');
Route::get('accountuser/edit/{id}', [AccountController::class,'edit'])->name('account.edit');
Route::put('accountuser/update/', [AccountController::class, 'update'])->name('account.update');
Route::POST('accountuser/destroy/', [AccountController::class,'destroy'])->name('account.destroy');

Route::get('billing/billinguser', [BillingController::class, 'billing'])->name('billing.billinguser');
Route::post('billinguser/billingcreate', [BillingController::class, 'billingcreate'])->name('billing.billingcreate');
Route::get('billing/billinguser', [BillingController::class, 'billingshow'])->name('billing.billinguser');


// Route::get('billing/billinguser', [BillingController::class, 'billing'])->name('billing.billinguser');
// Route::post('billinguser/billingcreate', [BillingController::class, 'billingcreate'])->name('billing.billingcreate');

