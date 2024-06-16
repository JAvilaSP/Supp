<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AccountTestController;

Route::get('/', function () {
    return Inertia::render('SuppIndex', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'userLoggedIn' => Auth::check(),
    ]);
});

Route::get('/dashboard', function () {
    if (auth()->user()->account_test) {
        return Inertia::render('Dashboard');
    } else {
        return Inertia::render('NewAccount', [
            'mayorcito' => auth()->user()->mayorcito,
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/accountcreate', [AccountTestController::class, 'store'])->middleware('auth')->name('accountcreate');


Route::middleware('auth')->group(function () {
    Route::get('/account_test', [AccountTestController::class, 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
