<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Booking System</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="auth-body">

<div class="auth-container">

    <div class="auth-card">

        <!-- Logo -->

        <div class="auth-logo">

            <img src="{{ asset('images/image2.jpeg') }}" alt="Logo">

            <h2>Booking System</h2>

            <p>Please login to continue</p>

        </div>

        <!-- Session Status -->

        @if(session('status'))

        <div class="success-message">

            {{ session('status') }}

        </div>

        @endif

        <!-- Form -->

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Email -->

            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter Email"
                    required
                    autofocus>

                @error('email')

                <small class="error">

                    {{ $message }}

                </small>

                @enderror

            </div>

            <!-- Password -->

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    required>

                @error('password')

                <small class="error">

                    {{ $message }}

                </small>

                @enderror

            </div>

            <!-- Remember -->

            <div class="remember">

                <input
                    type="checkbox"
                    name="remember"
                    id="remember">

                <label for="remember">

                    Remember Me

                </label>

            </div>

            <!-- Login Button -->

            <button class="auth-btn">

                Login

            </button>

            <!-- Links -->

            <div class="auth-links">

                @if(Route::has('password.request'))

                <a href="{{ route('password.request') }}">

                    Forgot Password?

                </a>

                @endif

                <a href="{{ route('register') }}">

                    Create Account

                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>
