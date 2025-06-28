
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Pest\Plugins\Profile;

Route::redirect('/', '/landing');

Route::get('/landing', function () {
    return view('pages.landing');
})->name('landing');
Route::get('/payment/method/{id}', [PaymentController::class, 'showMethod'])->name('method');


Route::get('product', [ProductController::class, 'index'])->name('venues');
Route::get('/create', [ProductController::class, 'create'])->name('venues.create');
Route::post('/create/post', [ProductController::class, 'store'])->name('venues.store');
Route::get('/about', [ProfileController::class, 'about'])->name('abouts');
Route::get('/team', [ProfileController::class, 'team'])->name('teams');
Route::get('/business', [ProfileController::class, 'business'])->name('businesss');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/detail/{id}', [BookingController::class, 'show'])->name('detail');
    Route::get('/venues/{venue}/edit', [ProductController::class, 'edit'])->name('venues.edit');
    Route::put('/venues/{venue}', [ProductController::class, 'update'])->name('venues.update');
    Route::delete('/venues/{venue}', [ProductController::class, 'destroy'])->name('venues.destroy');
    Route::get('/venues/my_venue', [ProductController::class, 'myVenues'])->name('venues.myVenues');
    Route::get('/payment', function () {
        return view('pages.payment');
    })->name('payment');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

    Route::get('/booking/summary/{id}', [BookingController::class, 'summary'])->name('booking.summary');
});

// Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class.':admin'])->group(function () {

// });

Route::get('/cart/count', [BookingController::class, 'getPendingBookingCount'])
    ->name('cart.count');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard1');
});

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

require __DIR__ . '/auth.php';
