<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'services' => Service::latest()->get(),
            'bookings' => Booking::with(['user','service'])->latest()->get()
        ]);
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
        $b = Booking::findOrFail($id);
        $b->status = 'approved';
        $b->save();

        return back();
    }

    public function reject($id)
    {
        $b = Booking::findOrFail($id);
        $b->status = 'rejected';
        $b->save();

        return back();
    }
}