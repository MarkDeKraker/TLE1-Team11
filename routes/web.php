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

/* * De Homepagina * */
Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::get('//{id}', function () {
    return view('detail');
})->name('detail');

Route::prefix('article')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
});

Route::get('/create', [ArticleController::class, 'create'])->name('article.create');

Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/edit/{id}', [ArticleController::class, 'update'])->name('article.update');

Route::post('/home', [ArticleController::class, 'store'])->name('article.store');

Auth::routes();

