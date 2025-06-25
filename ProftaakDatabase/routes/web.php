<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnderePaginaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OverController;
use App\Http\Controllers\ProductenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/anderepagina', [AnderePaginaController::class, 'show'])->name('anderepagina.show');

Route::get('/home', [HomeController::class, 'show'])->name('home.show');
Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/over', [OverController::class, 'show'])->name('over.show');

Route::get('/producten', [ProductenController::class, 'show'])->name('producten.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
Route::post('/dashboard/news', [DashboardController::class, 'storeNews'])->name('dashboard.news.store');
Route::put('/dashboard/news/{id}', [DashboardController::class, 'updateNews'])->name('dashboard.news.update');
Route::delete('/dashboard/news/{id}', [DashboardController::class, 'deleteNews'])->name('dashboard.news.delete');
