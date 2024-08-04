<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
        h1 {
            margin: 20px 0;
            font-size: 2em;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-width: 1200px;
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
        .product-link {
            text-decoration: none;
            color: #007bff;
        }
        .product-link:hover {
            text-decoration: underline;
        }
        .back-button {
            margin: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 1em;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <ul>
        @foreach($products as $product)
        <li>
            <div>
                <h2><a href="{{ route('product.show', $product->id) }}" class="product-link">{{ $product->name }}</a></h2>
                <p>{{ $product->description }}</p>
                <p>{{ rupiah($product->price) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
    <a href="/cart" class="back-button">View Cart</a>
</body>
</html>
