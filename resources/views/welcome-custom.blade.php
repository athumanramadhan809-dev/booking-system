<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            background: #1e3a8a;
            color: white;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .nav-links a {
            text-decoration: none;
            margin-left: 10px;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn-login {
            background: white;
            color: #1e3a8a;
        }

        .btn-register {
            background: #facc15;
            color: black;
        }

        /* HERO */
        .hero {
            height: 85vh;
            background: linear-gradient(to right, #2563eb, #1e40af);
            color: white;
            display: block;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        .hero-content {
            max-width: 600px;
            margin-left:auto;
            margin-right:auto;
        }

        .hero h1 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 25px;
        }

        .hero-buttons a {
            text-decoration: none;
            padding: 12px 25px;
            margin: 5px;
            border-radius: 6px;
            font-weight: bold;
        }

        .hero-login {
            background: white;
            color: #2563eb;
        }

        .hero-register {
            background: #facc15;
            color: black;
        }

        /* FEATURES */
        .features {
            padding: 60px 20px;
            text-align: center;
        }

        .features h2 {
            margin-bottom: 30px;
        }

        .feature-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .feature-box {
            background: white;
            padding: 20px;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .feature-box h3 {
            margin-bottom: 10px;
            color: #1e3a8a;
        }

        /* FOOTER */
        .footer {
            background: #1e293b;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        .logo{
            height: 50px;
            width: 50px;
            border-radius:60%;
        }
        .logo-section{
            display: flex;
            align-items:center;
            gap: 10px;
        }
        .img{
            height: 300px;
            width: 80%;
            border-radius:20%;
            gap: 10px;
            display: flex;
            align-items:center;
            margin-left:auto;
            margin-right:auto;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

<div class="logo-section">
   <img src="{{ asset('images/shine.png') }}" class="logo" alt="logo">
    <h2>Booking System</h2>
</div>

    <div class="nav-links">
        <a href="{{ route('login') }}" class="btn-login">Login</a>
        <a href="{{ route('register') }}" class="btn-register">Register</a>
    </div>
</div>



<!-- HERO -->
<div class="hero">
    <!-- IMAGES -->
 <div class="img">
        <img src="{{ asset('images/image1.jpeg') }}" class="img" alt="img1">
        <img src="{{ asset('images/image2.jpeg') }}" class="img" alt="img1">
    </div>


    <div class="hero-content">
        <h1>Welcome to Booking System</h1>
        <p>Book services easily and get approval from admin instantly</p>

        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="hero-login">Get Started</a>
            <a href="{{ route('register') }}" class="hero-register">Create Account</a>
        </div>
    </div>
</div>

<!-- FEATURES -->
<div class="features">
    <h2>Why Choose Us?</h2>

    <div class="feature-container">
        <div class="feature-box">
            <h3>Fast Booking</h3>
            <p>Book services in seconds</p>
        </div>

        <div class="feature-box">
            <h3>Admin Approval</h3>
            <p>Secure booking system with approval</p>
        </div>

        <div class="feature-box">
            <h3>Track Status</h3>
            <p>Monitor your booking anytime</p>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© {{ date('Y') }} Booking System</p>
</div>

</body>
</html>