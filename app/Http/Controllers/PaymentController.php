<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // Fetch the cart items. Adjust to your actual cart handling.
        $cartItems = Cart::all(); // Adjust this to fetch the correct cart for the invoice
        if ($cartItems->isEmpty()) {
            return redirect('/cart')->withErrors('Your cart is empty');
        }

        $transactionDetails = [];
        $total = 0;

        foreach ($cartItems as $item) {
            $transactionDetails[] = [
                'id' => $item->product->id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'name' => $item->product->name,
            ];
            $total += $item->product->price * $item->quantity;
        }

        // Set Midtrans configuration
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Create invoice
        $cart = $cartItems->first(); // Adjust as needed
        $invoice = Invoice::create([
            'cart_id' => $cart->id, // Make sure to use a valid cart ID
            'transaction_id' => uniqid(),
            'status' => 'incomplete',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $invoice->transaction_id,
                'gross_amount' => $total,
            ],
            'item_details' => $transactionDetails,
            'customer_details' => [
                'first_name' => 'Customer',
                'email' => 'customer@example.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', [
            'snapToken' => $snapToken,
            'invoice' => $invoice // Pass the invoice to the view
        ]);
    }

    public function finish(Request $request)
    {
        // Get the invoice ID from the request, e.g., from a query parameter or session
        $invoiceId = $request->query('invoice_id'); // Or use session, depending on your flow

        // Fetch the invoice
        $invoice = Invoice::find($invoiceId);

        if (!$invoice) {
            abort(404);
        }

        // Update invoice status based on the payment result
        $paymentStatus = $this->verifyPayment($request);

        if ($paymentStatus === 'success') {
            $invoice->update(['status' => 'complete']);
        } else {
            $invoice->update(['status' => 'incomplete']);
        }

        return view('payment_finish', ['invoice' => $invoice]);
    }

    private function verifyPayment(Request $request)
    {
        // Implement payment verification logic here
        // Return 'success', 'pending', or 'error' based on verification
        return 'success'; // Example return value, adjust as needed
    }
}
