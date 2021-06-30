<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController};
use App\Http\Controllers\Web\{HomeController, BlogController, PortofolioController, PricingController};

// Json Response
Route::get('/category/json', [CategoryController::class, 'json'])->name('admin.categories.json');
Route::get('/portofolio/json', [PortofolioController::class, 'json']);

// Route Web
Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/blog', [BlogController::class, 'index'])->name('web.blog');
Route::get('/pricing', [PricingController::class, 'index']);
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('web.portofolio');

require __DIR__ . '/auth.php';
