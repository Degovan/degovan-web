<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, PortofolioController};
use App\Http\Controllers\Web\{HomeController, BlogController};

// Json Response
Route::get('/category/json', [CategoryController::class, 'json'])->name('admin.categories.json');
Route::get('/portofolio/json', [PortofolioController::class, 'json'])->name('admin.portofolio.json');

// Route Web
Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/blog', [BlogController::class, 'index'])->name('web.blog');

require __DIR__ . '/auth.php';
