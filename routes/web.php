<?php

use App\Http\Controllers\WaitListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/billing', fn () => Inertia::render('Billing/Billing'))->name('billing');

Route::post('/waitlist/store', [WaitListController::class, 'store'])->name('waitlist.store');
