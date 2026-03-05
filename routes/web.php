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
    
    // Contact Messages
    Route::get('/contact-messages', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('admin.contact-messages.index');
    Route::get('/contact-messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('admin.contact-messages.show');
    Route::post('/contact-messages/{id}/toggle-read', [App\Http\Controllers\Admin\ContactMessageController::class, 'toggleRead'])->name('admin.contact-messages.toggle-read');
    Route::delete('/contact-messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('admin.contact-messages.destroy');
    
    // Bookings
    Route::get('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/bookings/{id}/update-status', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
    Route::delete('/bookings/{id}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    
    // Newsletter Subscribers
    Route::get('/newsletter-subscribers', [App\Http\Controllers\Admin\NewsletterSubscriberController::class, 'index'])->name('admin.newsletter-subscribers.index');
    Route::get('/newsletter-subscribers/compose', [App\Http\Controllers\Admin\NewsletterSubscriberController::class, 'compose'])->name('admin.newsletter-subscribers.compose');
    Route::post('/newsletter-subscribers/send', [App\Http\Controllers\Admin\NewsletterSubscriberController::class, 'send'])->name('admin.newsletter-subscribers.send');
    Route::post('/newsletter-subscribers/{id}/toggle-status', [App\Http\Controllers\Admin\NewsletterSubscriberController::class, 'toggleStatus'])->name('admin.newsletter-subscribers.toggle-status');
    Route::delete('/newsletter-subscribers/{id}', [App\Http\Controllers\Admin\NewsletterSubscriberController::class, 'destroy'])->name('admin.newsletter-subscribers.destroy');
    
    // Content Management
    Route::get('/content', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/content/{page}/edit', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin.content.edit');
    Route::post('/content/{page}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('admin.content.update');
    
    // Tour Guides
    Route::get('/tour-guides', [App\Http\Controllers\Admin\TourGuideController::class, 'index'])->name('admin.tour-guides.index');
    Route::get('/tour-guides/create', [App\Http\Controllers\Admin\TourGuideController::class, 'create'])->name('admin.tour-guides.create');
    Route::post('/tour-guides', [App\Http\Controllers\Admin\TourGuideController::class, 'store'])->name('admin.tour-guides.store');
    Route::get('/tour-guides/{id}/edit', [App\Http\Controllers\Admin\TourGuideController::class, 'edit'])->name('admin.tour-guides.edit');
    Route::post('/tour-guides/{id}', [App\Http\Controllers\Admin\TourGuideController::class, 'update'])->name('admin.tour-guides.update');
    Route::delete('/tour-guides/{id}', [App\Http\Controllers\Admin\TourGuideController::class, 'destroy'])->name('admin.tour-guides.destroy');
    
    // Testimonials
    Route::get('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{id}/edit', [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::post('/testimonials/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
});