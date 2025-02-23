<?php

use App\Http\Controllers\WaitListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/legal', fn () => Inertia::render('TermsOfService/TermsOfService'))->name('legal');
Route::get('error', fn () => Inertia::render('Errors/Error'))->name('error');
Route::post('/waitlist/store', [WaitListController::class, 'store'])->name('waitlist.store');

// uncomment to view emails
// Route::get('/email-test', fn () => new WaitListAdded());
