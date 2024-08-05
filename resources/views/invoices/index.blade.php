<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Invoices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
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
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #fff;
        }
        .status {
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('navbar')
    <h1 style="margin-top: 5rem">All Invoices</h1>
    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->transaction_id }}</td>
                <td class="status">{{ ucfirst($invoice->status) }}</td>
                <td>
                    <a href="{{ route('invoices.show', $invoice->id) }}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
