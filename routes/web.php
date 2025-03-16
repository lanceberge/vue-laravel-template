<?php

use App\Http\Controllers\EmailSubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\WaitListController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/email-subscriptions/update/', [EmailSubscriptionController::class, 'update'])
        ->name('email-subscriptions.update');
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

require __DIR__.'/auth.php';
