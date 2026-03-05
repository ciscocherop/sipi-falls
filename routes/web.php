<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicFormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

// Public pages
Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/travelguide', function () {
    return view('pages.travelguide');
})->name('travelguide');

// Form submissions
Route::post('/booking', [PublicFormController::class, 'booking'])->name('booking.submit');
Route::post('/contact', [PublicFormController::class, 'contact'])->name('contact.submit');
Route::post('/newsletter', [PublicFormController::class, 'newsletter'])->name('newsletter.submit');

// Auth routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes (protected by auth and admin middleware)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});