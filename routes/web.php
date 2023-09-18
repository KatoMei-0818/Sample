<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\BookmarkController;
use App\Admin\Controllers\HomeController;
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

Route::get('/', [ArticlesController::class, 'index'])->name('home');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::resource('articles', ArticlesController::class);
Route::get('userpage/{id}', [ArticlesController::class, 'userpage'])->name('userpage');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('tags', [TagsController::class, 'store'])->name('tags.store');
Route::get('tags/{id}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::get('tags/{id}', [TagsController::class, 'update'])->name('tags.update');
Route::patch('tags/{id}', [TagsController::class, 'update'])->name('tags.update');
Route::delete('tags/{id}', [TagsController::class, 'destroy'])->name('tags.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/articles/{article}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/articles/{article}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks', [ArticlesController::class, 'bookmark_articles'])->name('bookmarks');
});

require __DIR__.'/auth.php';
