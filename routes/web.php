<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, ContactController, DashboardController, MemberController};


// Route Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
        Route::resource('member', MemberController::class);
        Route::resource('portofolio/categories', CategoryController::class);
        Route::get('contact/json', [ContactController::class, 'json'])->name('admin.contact.json');
        Route::resource('contact', ContactController::class, [
        	'as' => 'admin'
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
