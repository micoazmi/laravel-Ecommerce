<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
            margin-top: 60px; /* Space for fixed navbar */
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            background-color: white;
            margin: 10px 0;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin: 0 0 10px;
            font-size: 1.5em;
            color: #333;
        }
        p {
            margin: 5px 0;
            color: #666;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
        }
        button[type="submit"], button[type="button"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #218838;
        }
        .remove-button {
            background-color: #dc3545;
        }
        .remove-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="navbar">
        @include('navbar')
    </div>
    <div class="content">
        <h1>Cart</h1>
        <ul>
            @php
                $total = 0;
            @endphp
            @foreach($cartItems as $item)
            <li>
                <div>
                    <h2>{{ $item->product->name }}</h2>
                    <p>{{ $item->product->description }}</p>
                    <p>Quantity: {{ $item->quantity }}</p>
                    <p>Price: {{ rupiah($item->product->price) }}</p>
                    <p>Subtotal: {{ rupiah($item->product->price * $item->quantity) }}</p>
                    @php
                        $total += $item->product->price * $item->quantity;
                    @endphp
                </div>
                <form action="/cart/remove/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="remove-button" onclick="this.closest('form').submit()">Remove</button>
                </form>
            </li>
            @endforeach
        </ul>
        <div class="total">Total: {{ rupiah($total) }}</div>
        <form action="/checkout" method="POST">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    </div>
</body>
</html>
