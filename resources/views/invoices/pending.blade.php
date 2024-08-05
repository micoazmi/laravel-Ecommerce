<!DOCTYPE html>
<html>
<head>
    <title>Payment Pending</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #ffc107;
        }
        p {
            font-size: 1.2em;
        }
        a {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Payment Pending</h1>
    <p>Your payment is pending. Please wait for confirmation.</p>
    <p>Invoice ID: {{ $invoice->id }}</p>
    <a href="/">Go to Homepage</a>
</body>
</html>
