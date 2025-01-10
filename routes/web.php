<?php

use App\Http\Controllers\WaitListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::post('/waitlist/store', [WaitListController::class, 'store'])->name('waitlist.store');
