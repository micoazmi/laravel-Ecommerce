<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice Details</h1>
        <p><strong>Invoice ID:</strong> {{ $invoice->id }}</p>
        <p><strong>Transaction ID:</strong> {{ $invoice->transaction_id }}</p>
        <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>

        <!-- Display cart items -->
        <h2>Items</h2>
        @if($invoice->cart)
            @if($invoice->cart->product)
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $invoice->cart->product->name }}</td>
                            <td>{{ number_format($invoice->cart->product->price, 2) }}</td>
                            <td>{{ $invoice->cart->quantity }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p>No products found for this cart.</p>
            @endif
        @else
            <p>No cart found for this invoice.</p>
        @endif

        <a href="{{ route('invoices.index') }}">Back to Invoices</a>
    </div>
</body>
</html>
