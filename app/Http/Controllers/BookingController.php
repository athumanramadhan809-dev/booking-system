<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'status' => 'pending'
        ]);

        return back()->with('success','Booking submitted');
    }
}