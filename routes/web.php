<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
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

// Logged out
Route::get('/', [ArticleController::class, 'index'])->name('home');

// Logged in
Route::middleware('auth')->group(function () {
    Route::get('/saved', [ArticleController::class, 'saved'])->name('saved');

    Route::prefix('article')->group(function () {
        Route::get('/', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store');

        Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/{id}/update', [ArticleController::class, 'update'])->name('article.update');

        Route::put('/{id}/toggle-save', [ArticleController::class, 'toggle_save'])->name('article.toggle-save');
    });
});

// No auth required
Route::get('/home', [ArticleController::class, 'index'])->name('home');

Route::prefix('article')->group(function () {
    Route::get('/{id}', [ArticleController::class, 'show'])->name('article.detail');
});

Auth::routes();
