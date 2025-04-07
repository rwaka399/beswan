<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-page', [AuthController::class, 'loginpage'])->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
   
    Route::prefix('master')->group(function () {
        Route::get('/dashboard', [ViewController::class, 'admin_dashboard'])->name('admin-dashboard');
    
    
    
        Route::prefix('user')->group(function () {
    
            Route::get('/', [UserController::class, 'index'])->name('user-index');
            Route::get('/create', [UserController::class, 'create'])->name('user-create');
            Route::post('/store', [UserController::class, 'store'])->name('user-store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('user-update');
            Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
        });
    
    
        Route::prefix('role')->group(function () {});
    
    
        Route::prefix('menu-master')->group(function () {});
    });
    

});
