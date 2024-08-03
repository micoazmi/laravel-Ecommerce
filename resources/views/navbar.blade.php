<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .navbar {
            background-color: #007bff;
            padding: 10px;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 0 15px;
            font-weight: bold;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .navbar-links {
            display: flex;
            align-items: center;
        }
        .navbar-links a {
            margin-left: 15px;
        }
        .navbar-brand {
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <a href="/">MyStore</a>
        </div>
        <div class="navbar-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Profile</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif

        </div>
        
    </div>
</body>
</html>
