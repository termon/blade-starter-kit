<?php

use App\Http\Controllers\HelpController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ============= Non-authenticated routes =================

// =======Authenticated app routes=======

Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

// =======User management routes=======
Route::prefix('/users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/edit/{user}', [UserController::class, 'update'])->middleware('mirror.prevent')->name('update');

    Route::post('/mirror/stop', [UserController::class, 'stop'])->name('mirror.stop');
    Route::post('/mirror/{user}', [UserController::class, 'start'])->middleware('mirror.prevent')->name('mirror.start');
});

// =======Guest app routes=======
Route::middleware('guest')->group(function () {});

require __DIR__.'/auth.php';

require __DIR__.'/ui-demo.php';
