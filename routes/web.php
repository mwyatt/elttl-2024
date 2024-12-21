<?php

use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group([], function () {
    Route::get('/', [BaseController::class, 'index'])->name('welcome');
});

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::prefix('locations')->group(function () {
        Route::get('', [AdminLocationController::class, 'index'])->name('admin.locations.index');
        Route::get('/{id}/edit', [AdminLocationController::class, 'edit'])->name('admin.locations.edit');
        Route::put('/{id}', [AdminLocationController::class, 'update'])->name('admin.locations.update');
    });
    Route::prefix('teams')->group(function () {
        Route::get('', [AdminTeamController::class, 'index'])->name('admin.teams.index');
        Route::get('/create', [AdminTeamController::class, 'create'])->name('admin.teams.create');
        Route::post('', [AdminTeamController::class, 'store'])->name('admin.teams.store');
        Route::get('/{id}', [AdminTeamController::class, 'show'])->name('admin.teams.show');
        Route::get('/{id}/edit', [AdminTeamController::class, 'edit'])->name('admin.teams.edit');
        Route::put('/{id}', [AdminTeamController::class, 'update'])->name('admin.teams.update');
        Route::delete('/{id}', [AdminTeamController::class, 'destroy'])->name('admin.teams.destroy');
    });
});

require __DIR__ . '/auth.php';
