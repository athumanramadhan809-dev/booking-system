<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- HEADER -->
    <header class="main-header">

        <div class="logo-section">

            <img src="{{ asset('images/shine.png') }}"
                 alt="logo"
                 class="logo">

            <h2 class="site-title">
                Booking System
            </h2>

        </div>

        <div>

            @auth

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button class="btn btn-red">
                        Logout
                    </button>

                </form>

            @endauth

        </div>

    </header>

    <!-- CONTENT -->
    <main>

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="main-footer">

        <p>
            © {{ date('Y') }}
            Booking System.
            All Rights Reserved.
        </p>

    </footer>

</body>
</html>