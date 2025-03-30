<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Show Login & Register Forms
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');

// Handle Registration & Login
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout


// Protect routes using custom middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/password/change', [ProfileController::class, 'changePasswordForm'])->name('password.change');
    Route::post('/password/change', [ProfileController::class, 'changePassword'])->name('password.update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
