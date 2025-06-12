<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\anderepaginaController;
use App\Http\Controllers\homeController;

Route::get('/anderepagina', [anderepaginaController::class, 'show'])->name('anderepagina.show');

Route::get('/home', [homeController::class, 'show'])->name('home.show');
