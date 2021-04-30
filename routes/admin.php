<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, DashboardController, MemberController, CategoryPostController, PortofolioController, TagController, PostController, ContactController, UserController};

// Route Admin
Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('member', MemberController::class);
    Route::resource('user', UserController::class);
    Route::get('portofolios/json', [PortofolioController:: class, 'json'])->name('admin.portofolio.json');
    Route::resource('portofolios', PortofolioController::class);
    Route::resource('portofolio/categories', CategoryController::class, [
        'as' => 'admin'
    ]);
    Route::resource('contact', ContactController::class, [
        'as' => 'admin'
    ]);
    Route::resource('post/category', CategoryPostController::class, [
        'as' => 'admin.post'
    ]);
    Route::resource('post/tag', TagController::class, [
        'as' => 'admin.post'
    ]);
    Route::post('post/tag/ajax/post', 'App\Http\Controllers\Admin\TagController@ajaxPost');
    Route::get('post/tag/ajax/getAll', 'App\Http\Controllers\Admin\TagController@ajaxGetAll');
    Route::resource('post', PostController::class, ['as' => 'admin']);
});
