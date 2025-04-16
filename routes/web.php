<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ViewController::class, 'home'])->name('home');

// Route::get('/')

Route::get('/login-page', [AuthController::class, 'loginpage'])->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');
Route::get('/register-page', [AuthController::class, 'registerpage'])->name('register-page');
Route::post('/register', [AuthController::class, 'register'])->name('register-post');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   
    Route::prefix('master')->group(function () {
        Route::get('/dashboard', [ViewController::class, 'admin_dashboard'])->name('admin-dashboard');
    
    
    
        Route::prefix('user')->group(function () {
    
            Route::get('/', [UserController::class, 'index'])->name('user-index');
            Route::get('/create', [UserController::class, 'create'])->name('user-create');
            Route::post('/store', [UserController::class, 'store'])->name('user-store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('user-update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
        });
    
    
        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('role-index');
            Route::get('/create', [RoleController::class, 'create'])->name('role-create');
            Route::post('/store', [RoleController::class, 'store'])->name('role-store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role-edit');
            Route::put('/update/{id}', [RoleController::class, 'update'])->name('role-update');
            Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('role-delete');
        });
    
    
        Route::prefix('menu-master')->group(function () {});
    });

    Route::get('/packages', [TransactionController::class, 'listPackages'])->name('packages.index');
    Route::get('/checkout/{lessonPackageId}', [TransactionController::class, 'showCheckout'])->name('checkout');
    Route::post('/transaction/create', [TransactionController::class, 'createInvoice'])->name('transaction.create');
    Route::get('/transaction/success', [TransactionController::class, 'success'])->name('transaction.success');
    Route::get('/transaction/failed', [TransactionController::class, 'failed'])->name('transaction.failed');
    Route::get('/keuangan/report', [TransactionController::class, 'financialReport'])->name('keuangan.report');
    Route::get('/invoices/history', [TransactionController::class, 'invoiceHistory'])->name('invoices.history');
    

});

Route::post('/transaction/webhook', [TransactionController::class, 'handleWebhook'])->name('transaction.webhook');
