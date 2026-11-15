<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Login
Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

Route::get('/login', [AuthController::class, 'showLogin']);

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Modules (Accessible to all authenticated roles; action buttons are restricted in the view)
Route::get('/modules', function () {
    return view('modules.index');
})->middleware('auth')->name('modules.index');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    // Verification Routes
Route::get('/verify', [AuthController::class, 'showVerify'])->name('verify.show');
Route::post('/verify', [AuthController::class, 'verify'])->name('verify.process');