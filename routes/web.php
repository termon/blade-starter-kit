<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// =======User auth routes=======
Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');
 
   Route::get("/edit", [UserController::class, "edit"])->name("user.edit");
    Route::put("/update", [UserController::class, "update"])->name("user.update");

    Route::post("/logout", [UserController::class, "logout"])->name("logout");
});


Route::middleware('guest')->group(function () {
    Route::get("/register", [UserController::class, "create"])->name("user.register");
    Route::post("/register", [UserController::class, "store"])->name("user.store");
    
    Route::get("/login", [UserController::class, "login"])->name("login");
    Route::post("/login", [UserController::class, "authenticate"])->name("authenticate");
    
   
});
