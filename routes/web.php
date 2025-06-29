<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Pest\Plugins\Profile;

Route::redirect('/', '/landing');

Route::get('/landing', function () {
    return view('pages.landing');
})->name('landing');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/payment/method/{id}', [PaymentController::class, 'showMethod'])->name('payment.method');
Route::get('product', [ProductController::class, 'index'])->name('venues');
Route::post('/create/post', [ProductController::class, 'store'])->name('venues.store');

Route::get('/about', [ProfileController::class, 'about'])->name('abouts');
Route::get('/team', [ProfileController::class, 'team'])->name('teams');
Route::get('/business', [ProfileController::class, 'business'])->name('businesss');

Route::middleware('auth')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('venues.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/detail/{id}', [BookingController::class, 'show'])->name('detail');
    Route::get('/dashboard1', [BookingController::class, 'index'])->name('dashboard1');
    Route::get('/venues/{venue}/edit', [ProductController::class, 'edit'])->name('venues.edit');
    Route::put('/venues/{venue}', [ProductController::class, 'update'])->name('venues.update');
    Route::delete('/venues/{venue}', [ProductController::class, 'destroy'])->name('venues.destroy');
    Route::get('/venues/my_venue', [ProductController::class, 'myVenues'])->name('venues.myVenues');
    Route::get('/payment', function () {
        return view('pages.payment');
    })->name('payment');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

    Route::get('/booking/summary/{id}', [BookingController::class, 'summary'])->name('booking.summary');
    Route::get('/booking/{id}', [BookingController::class, 'showBookingDetail'])->name('booking.detail');
});

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::prefix('reports')->name('reports.')->group(function () {
    Route::get('/users', [ReportController::class, 'getUsers'])->name('users');
    Route::get('/bookings', [ReportController::class, 'getBookings'])->name('bookings');
    Route::get('/financial', [ReportController::class, 'getFinancial'])->name('financial');
});
Route::patch('/report/update-role', [ReportController::class, 'updateRole'])->name('reports.updateRole');

Route::get('/cart/count', [BookingController::class, 'getPendingBookingCount'])
    ->name('cart.count');

require __DIR__ . '/auth.php';
