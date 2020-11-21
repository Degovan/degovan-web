<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController};

// Route Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

// Route Web
Route::get('/', function () {
    return view('dashboard');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');


require __DIR__.'/auth.php';
