<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="title">Admin Dashboard</div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-red">Logout</button>
    </form>
</div>

<!-- INTRO CARD -->
<div class="intro">
    <h2>Welcome  {{ auth()->user()->name }} </h2>
    <p>Manage services, bookings and system operations from here.</p>
</div>

<!-- NAV -->
<div class="navbar">
    <div class="nav-btn" onclick="show('add')">Add Service</div>
    <div class="nav-btn" onclick="show('services')"> Services</div>
    <div class="nav-btn" onclick="show('bookings')"> Bookings</div>
</div>

<!-- CONTENT -->
<div class="container">

    <!-- ADD SERVICE -->
    <div id="add" class="section active">

        <div class="card">
            <h3>Add Service</h3>

            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf

                <input class="form-input" type="text" name="name" placeholder="Service Name">

                <textarea class="form-input" name="description" placeholder="Description"></textarea>

                <input class="form-input" type="number" name="price" placeholder="Price">

                <button class="btn btn-blue">Add Service</button>
            </form>
        </div>

    </div>

    <!-- SERVICES -->
    <div id="services" class="section">

        <h3>Services</h3>

        @foreach($services as $service)
        <div class="card">

            <b>{{ $service->name }}</b>
            <p>{{ $service->description }}</p>
            <p><b>{{ number_format($service->price) }} TSH</b></p>

            <form method="POST" action="{{ route('admin.services.delete', $service->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-red">Delete</button>
            </form>

        </div>
        @endforeach

    </div>

    <!-- BOOKINGS -->
    <div id="bookings" class="section">

        <h3>Bookings</h3>

        @foreach($bookings as $booking)
        <div class="card">

            <b>{{ $booking->user->name }} - {{ $booking->service->name }}</b>

            <p class="{{ $booking->status }}">
                {{ $booking->status }}
            </p>

            <form method="POST" action="{{ route('admin.bookings.approve', $booking->id) }}">
                @csrf
                <button class="btn btn-blue">Approve</button>
            </form><br>

            <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}">
                @csrf
                <button class="btn btn-red">Reject</button>
            </form>

        </div>
        @endforeach

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

</body>
</html>