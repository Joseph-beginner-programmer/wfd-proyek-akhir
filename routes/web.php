<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/landing');

Route::get('/landing', function () {
    return view('pages.landing');
})->name('landing');

#Venue Listing
Route::get('venueList', [VenueController::class, 'index'])->name('venues');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class.':admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    });
    
});



require __DIR__.'/auth.php';
