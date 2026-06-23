@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')



<!-- INTRO CARD -->
<div class="intro">
    <h2>Welcome  {{ auth()->user()->name }} </h2>
    <p>Manage services, bookings and system operations from here.</p>
</div>

<!-- NAV -->
<div class="navbar">
    <div class="nav-btn" onclick="show('statistics')">Statistics</div>
    <div class="nav-btn" onclick="show('add')">Add Service</div>
    <div class="nav-btn" onclick="show('services')"> Services</div>
    <div class="nav-btn" onclick="show('bookings')"> Bookings</div>
</div>


<!-- CONTENT -->
 <div class="container">

    <!-- STATISTICS -->
   <div id="statistics" class="section active">

    <div class="stats-container">

        <h2 class="stats-title">
            System Statistics
        </h2>

        <div class="stats-row">

            <div class="stat-card">
                <span>Total Users</span>
                <h2>{{ $users }}</h2>
            </div>

            <div class="stat-card">
                <span>Total Services</span>
                <h2>{{ $totalServices }}</h2>
            </div>

            <div class="stat-card">
                <span>Total Bookings</span>
                <h2>{{ $totalBookings }}</h2>
            </div>

            <div class="stat-card pending-card">
                <span>Pending</span>
                <h2>{{ $pending }}</h2>
            </div>

            <div class="stat-card approved-card">
                <span>Approved</span>
                <h2>{{ $approved }}</h2>
            </div>

            <div class="stat-card rejected-card">
                <span>Rejected</span>
                <h2>{{ $rejected }}</h2>
            </div>

        </div>

    </div>

</div>

    <!-- ADD SERVICE -->
    <div id="add" class="section">

        <div class="card">

            <h2>Add New Service</h2>

            <form method="POST"
                  action="{{ route('admin.services.store') }}">

                @csrf

                <input
                    class="form-input"
                    type="text"
                    name="name"
                    placeholder="Service Name"
                    required>

                <textarea
                    class="form-input"
                    name="description"
                    placeholder="Description"
                    rows="4"
                    required></textarea>

                <input
                    class="form-input"
                    type="number"
                    name="price"
                    placeholder="Price"
                    required>

                <button class="btn btn-blue">
                    Add Service
                </button>

            </form>

        </div>

    </div>

    <!-- SERVICES -->
    <div id="services" class="section">

        <h2>Available Services</h2>

        @foreach($services as $service)

        <div class="card">

            <h3>{{ $service->name }}</h3>

            <p>{{ $service->description }}</p>

            <strong>
                {{ number_format($service->price) }} TZS
            </strong>

            <br><br>

            <form method="POST"
                  action="{{ route('admin.services.delete',$service->id) }}">

                @csrf
                @method('DELETE')

                <button class="btn btn-red">
                    Delete Service
                </button>

            </form>

        </div>

        @endforeach

    </div>

    <!-- BOOKINGS -->
    <div id="bookings" class="section">

        <div class="card">

            <h2>Bookings Management</h2>

            <table class="table">

                <thead>

                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Approved By</th>
                    <th>Action</th>
                </tr>

                </thead>

                <tbody>

                @foreach($bookings as $booking)

                <tr>

                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->service->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->time_slot }}</td>

                    <td>

                        @if($booking->status == 'pending')
                            <span class="pending">Pending</span>

                        @elseif($booking->status == 'approved')
                            <span class="approved">Approved</span>

                        @else
                            <span class="rejected">Rejected</span>
                        @endif

                    </td>

                    <td>

                        @if($booking->approver)
                            {{ $booking->approver->name }}
                        @else
                            Not Processed
                        @endif

                    </td>

                    <td>

                        @if($booking->status == 'pending')

                        <form method="POST"
                              action="{{ route('admin.bookings.approve',$booking->id) }}"
                              style="display:inline">

                            @csrf

                            <button class="btn btn-blue">
                                Approve
                            </button>

                        </form>

                        <form method="POST"
                              action="{{ route('admin.bookings.reject',$booking->id) }}"
                              style="display:inline">

                            @csrf

                            <button class="btn btn-red">
                                Reject
                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

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