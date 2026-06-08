<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
{
    $services = \App\Models\Service::all();

    $bookings = \App\Models\Booking::with('service')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('dashboard', compact('services', 'bookings'));
}
public function bookService(Request $request)
{
    Booking::create([
    'user_id' => auth()->id(),
    'service_id' => $request->service_id,
    'booking_date' => now()->toDateString(),
    'time_slot' => $request->time_slot,
    'status' => 'pending'
]);

    return back()->with('success', 'Booking sent! Waiting for approval.');
}
}
