<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicFormController;
Route::get('/', function () {
    return view('welcome');
});
Route::post('/booking', [PublicFormController::class, 'booking'])->name('booking.submit');
Route::post('/contact', [PublicFormController::class, 'contact'])->name('contact.submit');
Route::post('/newsletter', [PublicFormController::class, 'newsletter'])->name('newsletter.submit');

// Contact page (GET)
Route::view('/contact', 'pages.contact')->name('contact');

// Contact submit (POST)
Route::post('/contact', [PublicFormController::class, 'contact'])->name('contact.submit');
Route::post('/newsletter', [PublicFormController::class, 'newsletter'])->name('newsletter.submit');

Route::post('/booking', [PublicFormController::class, 'booking'])->name('booking.submit');