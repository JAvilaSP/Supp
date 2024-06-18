<?php

use App\Http\Controllers\HistoricBalanceController;
use App\Http\Controllers\ProfileController;
use App\Models\HistoricBalance;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AccountTestController;
use App\Http\Controllers\TransactionController;

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

Route::get('/damedinero', [TransactionController::class, 'perderDinero']);
Route::get('/robadinero', [TransactionController::class, 'ganarDinero']);

Route::middleware('auth')->group(function () {
    Route::get('/account_test', [AccountTestController::class, 'show']);
    Route::get('/historic_balance', [HistoricBalanceController::class, 'create'])->name('historicbalance.create');
    Route::get('/see_historic_balances', [HistoricBalanceController::class, 'show'])->name('historicbalance.show');
    Route::get('/see_current_balance', [AccountTestController::class, 'update'])->name('balance.upd');
    Route::get('/punish_account', [AccountTestController::class, 'destroy'])->name('acc.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/new-transfer', function() {
        return Inertia::render('NewTransfer');
    })->name('maketransfer');
    route::post('/new-transfer/process', [TransactionController::class, 'store'])->name('maketransfer.process');
});

require __DIR__ . '/auth.php';
