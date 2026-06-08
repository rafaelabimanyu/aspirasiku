<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Language Switcher Route
Route::get('/language/{locale}', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');

// Public Route (Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Guest-only Routes (Auth Forms)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Dashboard Route
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');
    });

    // Petugas Dashboard Route
    Route::middleware('role:petugas')->group(function () {
        Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('petugas.dashboard');
    });

    // Masyarakat Dashboard Route
    Route::middleware('role:masyarakat')->group(function () {
        Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('user.dashboard');
    });
});
