<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

// This routes can be accessed without login required
Route::namespace('App\\Http\\Controllers\\Api')->group(function() {
    Route::resource('member', 'MemberController', [
        'only' => [
            'index', 'show'
        ]
    ]);
    Route::resource('portofolio', 'MemberController', [
        'only' => [
            'index', 'show'
        ]
    ]);
});

// This routes is login required
Route::middleware('auth:sanctum')->namespace('App\\Http\\Controllers\\Api')->group(function() {
    Route::resource('member', 'MemberController', [
        'only' => [
            'store', 'update', 'destroy'
        ]
    ]);
    Route::resource('portofolio', 'PortofolioController', [
        'only' => [
            'store', 'update', 'destroy'
        ]
    ]);
    Route::post('logout', [AuthController::class, 'logout']);
});
