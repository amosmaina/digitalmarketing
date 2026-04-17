<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\EventManagementController;
use App\Http\Controllers\Admin\EventAdminController;

Route::get('/', [ServiceController::class, 'index'])->name('welcome');
Route::get('/event-management', [EventManagementController::class, 'index'])->name('events.index');
Route::post('/event-management/book', [EventManagementController::class, 'store'])->name('events.book');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/services/{slug}/brochure', [ServiceController::class, 'downloadBrochure'])->name('services.brochure');

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin & Marketer Routes
Route::middleware(['auth', 'backoffice'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('services', AdminController::class)->except(['index', 'show']);
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');
    
    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // Client Management
    Route::get('/clients', [AdminController::class, 'clients'])->name('admin.clients.index');
    Route::post('/inquiries/{inquiry}/convert', [AdminController::class, 'convertInquiry'])->name('admin.inquiries.convert');

    // Invoicing
    Route::get('/invoices', [AdminController::class, 'invoices'])->name('admin.invoices.index');
    Route::get('/clients/{client}/invoice', [AdminController::class, 'createInvoice'])->name('admin.invoices.create');
    Route::post('/invoices', [AdminController::class, 'storeInvoice'])->name('admin.invoices.store');
    Route::get('/invoices/{invoice}/download', [AdminController::class, 'downloadInvoice'])->name('admin.invoices.download');

    // POS
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products.index');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');

    // Page Sections
    Route::get('/sections', [AdminController::class, 'pageSections'])->name('admin.sections.index');
    Route::post('/sections', [AdminController::class, 'storeSection'])->name('admin.sections.store');

    // Event Management Admin
    Route::get('/event-services', [EventAdminController::class, 'services'])->name('admin.event-services.index');
    Route::post('/event-services', [EventAdminController::class, 'storeService'])->name('admin.event-services.store');
    Route::delete('/event-services/{service}', [EventAdminController::class, 'destroyService'])->name('admin.event-services.destroy');
    
    Route::get('/event-bookings', [EventAdminController::class, 'bookings'])->name('admin.event-bookings.index');
    Route::get('/event-bookings/{booking}', [EventAdminController::class, 'showBooking'])->name('admin.event-bookings.show');
    Route::post('/event-bookings/{booking}/invoice', [EventAdminController::class, 'generateInvoice'])->name('admin.event-bookings.invoice');
});
