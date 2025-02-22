<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\WaitListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/legal', fn () => Inertia::render('TermsOfService/TermsOfService'))->name('legal');
Route::get('error', fn () => Inertia::render('Errors/Error'))->name('error');
Route::post('/waitlist/store', [WaitListController::class, 'store'])->name('waitlist.store');
