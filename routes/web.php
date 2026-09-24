<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : view('auth.login');
})->name('home');

Route::get('/dashboard', function () {
    $route = match (auth()->user()->peran) {
        'admin' => 'admin.dashboard',
        'operator' => 'operator.dashboard',
        'pengemudi' => 'pengguna.dashboard',
        default => null,
    };

    return $route ? redirect()->route($route) : abort(403);
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        abort_unless(auth()->user()->peran === 'admin', 403);

        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/role-hak-akses', function () {
        abort_unless(auth()->user()->peran === 'admin', 403);

        return view('admin.role-hak-akses');
    })->name('role-hak-akses');
});

Route::middleware('auth')->prefix('operator')->name('operator.')->group(function () {
    Route::get('/dashboard', function () {
        abort_unless(auth()->user()->peran === 'operator', 403);

        return view('operator.dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        abort_unless(auth()->user()->peran === 'pengemudi', 403);

        return app(PenggunaDashboardController::class)($request);
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
