<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, ContactController, DashboardController, MemberController, CategoryPostController};


// Route Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
        Route::resource('member', MemberController::class);
        Route::resource('portofolio/categories', CategoryController::class);
        Route::resource('contact', ContactController::class, [
        	'as' => 'admin'
        ]);
        Route::resource('post/category', CategoryPostController::class, [
            'as' => 'admin.post'
        ]);
    });

// Route Web
Route::get('/', function () {
    return view('dashboard');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');


require __DIR__ . '/auth.php';
