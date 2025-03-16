<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\WaitListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/billing', fn () => Inertia::render('Billing/Billing'))->name('billing');

Route::middleware('auth')-> group(function () {
    Route::get('/subscription/checkout/{planName}', [BillingController::class, 'subscribe'])->name('checkout');
    Route::get('/billing/manage', [BillingController::class, 'manage'])->name('billing.manage');
});

Route::get('/legal', fn () => Inertia::render('TermsOfService/TermsOfService'))->name('legal');
Route::get('error', fn () => Inertia::render('Errors/Error'))->name('error');
Route::post('/waitlist/store', [WaitListController::class, 'store'])->name('waitlist.store');

// uncomment to view emails
// Route::get('/email-test', fn () => new WaitListAdded());
