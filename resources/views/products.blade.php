<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin: 20px 0;
            font-size: 2em;
            color: #333;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        li {
            margin: 15px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        p {
            margin: 5px 0;
            color: #666;
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
    <h1>Products</h1>
    <ul>
        @foreach($products as $product)
        <li>
            <div>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>{{ rupiah($product->price) }}</p>
            </div>
            <form action="/add-to-cart/{{ $product->id }}" method="POST">
                @csrf
                <div class="quantity-control">
                    <button type="button" onclick="decrementQuantity(this)">-</button>
                    <input type="number" name="quantity" value="1" min="1" readonly>
                    <button type="button" onclick="incrementQuantity(this)">+</button>
                </div>
                <button type="submit">Add to Cart</button>
            </form>
        </li>
        @endforeach
    </ul>
    <a href="/cart">View Cart</a>
</body>
</html>
