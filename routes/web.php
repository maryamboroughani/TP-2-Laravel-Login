<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [EtudiantController::class, 'index'])->name('etudiants.index');

Route::prefix('etudiants')->group(function () {
    Route::get('/create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/create', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::get('/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::delete('/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
});
Route::get('/etudiants', [EtudiantController::class, 'index'])
    ->middleware('auth')
    ->name('etudiants.index');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');


Route::get('/forgot', [ForgotPasswordController::class, 'forgot'])->name('user.forgot');
Route::post('/forgot', [ForgotPasswordController::class, 'email'])->name('user.email');
Route::get('/reset/{user}/{token}', [ForgotPasswordController::class, 'reset'])->name('user.reset');
Route::put('/reset/{user}/{token}', [ForgotPasswordController::class, 'resetUpdate'])->name('user.reset.update');


Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::middleware(['auth'])->group(function () {
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/forum', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/forum/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/forum', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/forum/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/forum/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/forum/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::middleware(['auth', 'role:author'])->group(function () {
    Route::resource('articles', ArticleController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
