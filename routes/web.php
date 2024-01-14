<?php

use App\Http\Controllers\ContactPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Guest Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Home / Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// News Posts
Route::resource('posts', PostController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('posts', PostController::class)
    ->only('index');

Route::resource('posts', PostController::class)
    ->only(['store'])
    ->middleware(['auth', 'verified', 'admin']);

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/promote', [ProfileController::class, 'promote'])
        ->middleware('admin')
        ->name('profile.promote');
});
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// ContactPost
Route::resource('/contact', ContactPostController::class)
    ->only(['index', 'store']);

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/auth.php';
