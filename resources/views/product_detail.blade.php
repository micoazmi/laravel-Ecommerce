<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .navbar {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .content {
            margin-top: 10rem; /* Space for fixed navbar */
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
        }
        .product-details {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .product-details h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }
        .product-details p {
            margin: 5px 0;
            color: #666;
        }
        .back-button {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .quantity-control button {
            width: 40px;
            height: 40px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 1.25em;
            cursor: pointer;
            border-radius: 5px;
        }
        .quantity-control input {
            width: 60px;
            text-align: center;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px;
        }
        form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
        }
        a {
            display: block;
            text-align: center;
            margin: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 1.2em;
        }
    </style>
    <script>
        function incrementQuantity(button) {
            const input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        }

        function decrementQuantity(button) {
            const input = button.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</head>
<body>
    <div class="navbar">
        @include('navbar')
    </div>
    <div class="content">
        <h1>Product Detail</h1>
        <div class="product-details">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: {{ rupiah($product->price) }}</p>
            <form action="/add-to-cart/{{ $product->id }}" method="POST">
                @csrf
                <div class="quantity-control">
                    <button type="button" onclick="decrementQuantity(this)">-</button>
                    <input type="number" name="quantity" value="1" min="1" readonly>
                    <button type="button" onclick="incrementQuantity(this)">+</button>
                </div>
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <a href="/" class="back-button">Back to Store</a>
    </div>
</body>
</html>
