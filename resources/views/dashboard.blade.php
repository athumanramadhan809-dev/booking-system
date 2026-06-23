@extends('layouts.app')

@section('title','User Dashboard')

@section('content')


<!-- INTRO -->
<div class="intro">
    <h2>Welcome {{ auth()->user()->name }} </h2>
    <p>Browse services and make bookings. Track your booking status anytime.</p>
</div>

<!-- NAV -->
<div class="navbar">
    <div class="nav-btn" onclick="show('services')"> Services</div>
    <div class="nav-btn" onclick="show('bookings')"> My Bookings</div>
</div>

<!-- CONTENT -->
<div class="container">

    <!-- SERVICES -->
    <div id="services" class="section active">

        <h3>Available Services</h3>

        @forelse($services as $service)
        <div class="card">

            <b>{{ $service->name }}</b>
            <p>{{ $service->description }}</p>
            <p><b>{{ number_format($service->price) }} TSH</b></p>

            <form method="POST" action="{{ route('book.service') }}">
                @csrf

                <input type="hidden"
                       name="service_id"
                       value="{{ $service->id }}"><br>

                <label>
                    Booking Date
                </label>

                <input type="date"
                       name="booking_date"
                       required
                       class="form-input"><br>

                <label>
                    Time Slot
                </label>

                <input type="time"
                       name="time_slot"
                       required
                       class="form-input"><br>

                <button class="btn btn-blue">Book Now</button>
            </form>

        </div>
        @empty
        <div class="card">
            No services available
        </div>
        @endforelse

    </div>

    <!-- BOOKINGS -->
    <div id="bookings" class="section">

        <h3>My Bookings</h3>

        @forelse($bookings as $booking)
        <div class="card">

            <b>{{ $booking->service->name }}</b>

            <p>
                Status:
                @if($booking->status == 'pending')
                    <span class="pending">Pending</span>
                @elseif($booking->status == 'approved')
                    <span class="approved">Approved</span>
                @else
                    <span class="rejected">Rejected</span>
                @endif
            </p>

        </div>
        @empty
        <div class="card">
            No bookings available
        </div>
        @endforelse

    </div>

</div>

<!-- SPA SCRIPT -->
<script>
function show(id) {
    document.querySelectorAll('.section').forEach(s => {
        s.classList.remove('active');
    });

    document.getElementById(id).classList.add('active');
}
</script>


@endsection