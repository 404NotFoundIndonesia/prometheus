<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // DASHBOARD
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('manage')->as('manage.')->group(function () {
        Route::get('/user', [\App\Http\Controllers\Web\Manage\UserController::class, 'index'])->name('user.index');
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
