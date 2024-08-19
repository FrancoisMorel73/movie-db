<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/movies', [MovieController::class, 'allMovies'])->name('movie.all');
Route::get('/movies/{slug}', [MovieController::class, 'showMovie'])->name('movie.show');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('movie.favorites');
Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::post('/movies/{id}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.edit');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
