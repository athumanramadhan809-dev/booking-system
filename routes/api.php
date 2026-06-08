<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

Route::get('/services', [ServiceController::class, 'index']);

Route::post('/book', [BookingController::class, 'store']);

Route::get('/my-bookings', [BookingController::class, 'myBookings']);