<?php

use App\Http\Controllers\HelpController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// =======Authenticated app routes=======
Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

// =======User management routes=======
Route::prefix('/users')->name('users.')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');  
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');  
    Route::post('/edit/{id}', [UserController::class, 'update'])->name('update');  
            
    Route::get('/mirror/stop', [UserController::class, 'stop'])->name('mirror.stop');
    Route::get('/mirror/{id}', [UserController::class, 'start'])->name('mirror.start');
});

// =======Guest app routes=======
Route::middleware('guest')->group(function () {
   
});

require __DIR__.'/auth.php';
