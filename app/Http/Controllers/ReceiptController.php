<?php

namespace App\Http\Controllers;

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
            'category' => 'required|string'
        ]);
        dd($request);

        // Get previous session data
        $amount = session('amount');
        $currency = session('currency');

        // insert data
        Receipt::create([
            'amount' => $amount,
            'currency' => $currency,
            'category' => $validated['category'],
        ]);

        session()->forget(['amount', 'currency']);

        return redirect()->route('welcome')->with('success', 'Receipt added!');
    }
}
