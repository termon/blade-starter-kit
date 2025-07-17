<?php

use App\Http\Controllers\HelpController;
use Illuminate\Support\Facades\Route;

// =======Authenticated app routes=======
Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

// =======Guest app routes=======
Route::middleware('guest')->group(function () {
   
});

require __DIR__.'/auth.php';
