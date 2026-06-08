<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
/*Welcome page*/
Route::get('/', function () {
    return view('welcome-custom');
});

/* ================= AUTH ROUTES ================= */
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
/*====================REGISTER ROUTES====================*/
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

/* ================= PROTECTED ROUTES ================= */
Route::middleware(['auth'])->group(function () {

    /* USER */
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/book-service', [UserController::class, 'bookService'])->name('book.service');

    /* ADMIN */
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/services/store', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');

    Route::post('/admin/bookings/approve/{id}', [AdminController::class, 'approve'])->name('admin.bookings.approve');
    Route::post('/admin/bookings/reject/{id}', [AdminController::class, 'reject'])->name('admin.bookings.reject');
});

/* ================= NoCache ROUTES ================= */

Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});