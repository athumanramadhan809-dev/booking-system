<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    $users = User::count();

    $services = Service::all();

    $totalServices = Service::count();

    $totalBookings = Booking::count();

    $pending = Booking::where('status','pending')->count();

    $approved = Booking::where('status','approved')->count();

    $rejected = Booking::where('status','rejected')->count();

    $bookings = Booking::with([
        'user',
        'service',
        'approver'
    ])->latest()->get();

    return view('admin.dashboard', compact(
        'users',
        'services',
        'totalServices',
        'totalBookings',
        'pending',
        'approved',
        'rejected',
        'bookings'
    ));
}

    /* ============ SERVICES ============ */

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return back()->with('success','Service added successfully');
    }

    public function deleteService($id)
{
    $service = \App\Models\Service::find($id);

    if (!$service) {
        return back()->with('error', 'Service not found');
    }

    $service->delete();

    return back()->with('success', 'Service deleted successfully');
}

    /* ============ BOOKINGS ============ */

    public function approve($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'approved',
        'approved_by' => auth()->id()
    ]);

    return back()->with('success','Booking Approved');
}

    public function reject($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'rejected',
        'approved_by' => auth()->id()
    ]);

    return back()->with('success','Booking Rejected');
}
}