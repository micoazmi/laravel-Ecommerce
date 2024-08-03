<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Global styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
            margin-top: 4rem; /* Same as navbar height */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            z-index: 10;
            height: 4rem; /* Adjust as needed */
        }

        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            max-width: 400px;
            width: 100%;
            margin-bottom: 2rem;
            margin-top: 8rem; /* Ensure it is below the navbar */
        }

        .card h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1rem;
            color: #666;
        }

        .products {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }
    </style>
</head>
<body class="antialiased">
    <div class="navbar">
        @include('navbar')
    </div>

    <div class="card">
        <h1>Welcome to My Store</h1>
        <p>Explore our products and enjoy the best shopping experience.</p>
    </div>

    <!-- Include the products view -->
    @include('products')
</body>
</html>
