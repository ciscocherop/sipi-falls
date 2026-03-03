<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicFormController;

// Public pages
Route::get('/', function () {
    return view('index1');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/travelguide', function () {
    return view('travelguide');
})->name('travelguide');

// Form submissions
Route::post('/booking', [PublicFormController::class, 'booking'])->name('booking.submit');
Route::post('/contact', [PublicFormController::class, 'contact'])->name('contact.submit');
Route::post('/newsletter', [PublicFormController::class, 'newsletter'])->name('newsletter.submit');