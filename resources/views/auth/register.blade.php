<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Booking System</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="auth-body">

<div class="auth-container">

    <div class="auth-card">

        <!-- LOGO -->

        <div class="auth-logo">

            <img src="{{ asset('images/image2.jpeg') }}" alt="Logo">

            <h2>Booking System</h2>

            <p>Create a New Account</p>

        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <!-- NAME -->

            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter Full Name"
                    required
                    autofocus>

                @error('name')

                <small class="error">
                    {{ $message }}
                </small>

                @enderror

            </div>

            <!-- EMAIL -->

            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter Email Address"
                    required>

                @error('email')

                <small class="error">
                    {{ $message }}
                </small>

                @enderror

            </div>

            <!-- PASSWORD -->

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

            <!-- CONFIRM PASSWORD -->

            <div class="form-group">

                <label>Confirm Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required>

            </div>

            <!-- ROLE -->

            <div class="form-group">

                <label>Select Role</label>

                <select name="role" required>

                    <option value="user">User</option>

                    <option value="admin">Admin</option>

                </select>

                @error('role')

                <small class="error">
                    {{ $message }}
                </small>

                @enderror

            </div>

            <!-- REGISTER BUTTON -->

            <button type="submit" class="auth-btn">

                Register

            </button>

            <!-- LOGIN LINK -->

            <div class="auth-links">

                <span>Already have an account?</span>

                <a href="{{ route('login') }}">

                    Login Here

                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>