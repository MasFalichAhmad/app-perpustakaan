<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Login dan logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Informasi admin
Route::prefix('admin')->group(function () {
    Route::get('/info', function () {
        return 'Informasi Admin Perpustakaan';
    });
});

// Semua halaman berikut wajib login
Route::middleware(['auth'])->group(function () {

    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('loans', LoanController::class);

    Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');

    // Hanya admin yang boleh mengakses kategori
    Route::middleware(['admin'])->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });

    Route::get('/profil', [ProfileController::class, 'show'])
    ->name('profile.show');

    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');
});