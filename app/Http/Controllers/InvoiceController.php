<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index()
    {
        // Fetch all invoices
        $invoices = Invoice::all();

        // Return the view with the invoices data
        return view('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('cart.product')->find($id);

        if (!$invoice) {
            return redirect()->route('invoices.index')->with('error', 'Invoice not found.');
        }

        return view('invoices.show', compact('invoice'));
    }

    public function success($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->status = 'complete';
        $invoice->save();
        
        return view('invoices.success', compact('invoice'));
    }

    public function pending($id)
    {
        $invoice = Invoice::findOrFail($id);
        
        return view('invoices.pending', compact('invoice'));
    }

    public function error($id)
    {
        $invoice = Invoice::findOrFail($id);
        
        return view('invoices.error', compact('invoice'));
    }
}
