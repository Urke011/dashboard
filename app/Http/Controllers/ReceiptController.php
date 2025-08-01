<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\ReceiptCategory;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function step1(Request $request)
    {
        //Sdd($request);
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string'
        ]);

        session(['amount' => $validated['amount'], 'currency' => $validated['currency']]);
        return redirect()->route('receipt.step2');
    }

    public function step2()
    {
        if (!session()->has('amount')) {
            return redirect()->route('receipt.step1');
        }

        return view('receipt.step2');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'receipt_category_id' => 'required|exists:receipt_categories,id',
        ]);

        $amount = session('amount');
        $currency = session('currency');

        if (!$amount || !$currency) {
            return redirect()->route('receipt.step1')->withErrors(['session' => 'Session expired. Please enter the receipt again.']);
        }

        Receipt::create([
            'amount' => $amount,
            'currency' => $currency,
            'receipt_category_id' => $validated['receipt_category_id'],
        ]);

        // Optionally clear session
        session()->forget(['amount', 'currency']);

        return redirect()->route('welcome')->with('success', 'Receipt successfully saved!');
    }



}
