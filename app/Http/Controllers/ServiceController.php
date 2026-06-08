<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
{
    return response()->json(\App\Models\Service::all());
}

public function store(Request $request) {
    Service::create($request->all());
    return response()->json(['message' => 'Service created']);
}
}
