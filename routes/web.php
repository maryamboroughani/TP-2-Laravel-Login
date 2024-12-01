<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', [EtudiantController::class, 'index'])->name('etudiants.index');

Route::prefix('etudiants')->group(function () {
    Route::get('/create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/create', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::get('/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::delete('/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
});

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::prefix('password')->group(function () {
    Route::get('/forgot', [ForgotPasswordController::class, 'forgot'])->name('user.forgot');
    Route::post('/forgot', [ForgotPasswordController::class, 'email'])->name('user.email');
    Route::get('/reset/{user}/{token}', [ForgotPasswordController::class, 'reset'])->name('user.reset');
    Route::put('/reset/{user}/{token}', [ForgotPasswordController::class, 'resetUpdate'])->name('user.reset.update');
});

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');
