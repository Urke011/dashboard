<?php

namespace App\Http\Controllers;

use App\Mail\WeekendMailReport;
use App\Models\Receipt;
use App\Models\ReceiptCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


    public function showWeekendSpending()
    {

        $allCategories = $this->getWeeklyReceipts();

        // 1. Collection of all bills by category
        $categoriesData = $this->getAllReceiptsForCategories($allCategories);

        // 2. Amount formatting
        $categoriesData = $this->formatReceipts($categoriesData);

        // 3. Calculating percentages, food is not included in the grand total
        $categoriesData = $this->calculatePercentages($categoriesData);

        return view('weekend-spending', [
            'categoriesData' => $categoriesData,
        ]);
    }

    private function getAllReceiptsForCategories($categories)
    {
        $categoriesData = collect();

        foreach ($categories as $category) {
            $allReceipts = collect();

            // add our accounts
            $allReceipts = $allReceipts->merge($category->receipts);

            // add child category accounts
            foreach ($category->children as $child) {
                foreach ($child->receipts as $receipt) {
                    $receipt->category_name = $child->label;
                    $allReceipts->push($receipt);
                }
            }
            $categoriesData->push([
                'category' => $category,
                'receipts' => $allReceipts,
            ]);
        }

        return $categoriesData;
    }

    private function formatReceipts($categoriesData)
    {
        return $categoriesData->map(function ($data) {
            foreach ($data['receipts'] as $receipt) {
                if ($receipt->currency < 3) {
                    $receipt->amount *= 117;
                }
                $receipt->formatted_amount = number_format($receipt->amount, 0, ',', '.') . ' rsd';
                if (!isset($receipt->category_name)) {
                    $receipt->category_name = $data['category']->label;
                }
            }

            $data['totalAmount'] = $data['receipts']->sum('amount');

            return $data;
        });
    }

    private function calculatePercentages($categoriesData)
    {
        // Grand total = all categories except food (id=9)
        $grandTotal = $categoriesData
            ->where('category.id', '!=', 9)
            ->sum('totalAmount');

        return $categoriesData->map(function ($data) use ($grandTotal, $categoriesData) {

            if ($data['category']->id === 9) {
                // Food category percentages = sum of percentages of all subcategories
                $foodChildTotal = $categoriesData
                    ->filter(fn($c) => $c['category']->parent_id === 9)
                    ->sum('totalAmount');

                $data['percent'] = $grandTotal > 0 ? round(($foodChildTotal / $grandTotal) * 100, 1) : 0;

            } elseif ($data['category']->parent_id === 9) {
                // The subcategories of food show the percentage in relation to the grand total
                $data['percent'] = $grandTotal > 0 ? round(($data['totalAmount'] / $grandTotal) * 100, 1) : 0;

            } else {
                // Other categories calculate percentages normally
                $data['percent'] = $grandTotal > 0 ? round(($data['totalAmount'] / $grandTotal) * 100, 1) : 0;
            }

            return $data;
        });
    }


    public function sendWeekendSpendingMail()
    {
        try {
            //$allCategories = ReceiptCategory::with(['receipts', 'children.receipts'])->get();

            $allCategories = $this->getWeeklyReceipts();
            $categoriesData = $this->getAllReceiptsForCategories($allCategories);
            $categoriesData = $this->formatReceipts($categoriesData);
            $categoriesData = $this->calculatePercentages($categoriesData);

            $foodSubcategories = $this->getFoodSubcategoriesData($categoriesData);

            // remove the Food subcategories from the main table
            $categoriesData = $categoriesData->filter(function ($data) {
                return $data['category']->id === 9 || $data['category']->parent_id === null;
            });

            // sort the main categories by percentage in descending order
            $categoriesData = $categoriesData->sortByDesc('percent');


            return  Mail::to('rajkovicuros011@gmail.com')
                ->send(new WeekendMailReport($categoriesData, $foodSubcategories));

        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    private function getFoodSubcategoriesData($categoriesData)
    {
        return $categoriesData
            ->filter(fn($data) => $data['category']->parent_id === 9)
            ->sortByDesc('percent');
    }

    public function getWeeklyReceipts()
    {
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->subWeek();
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY)->subWeek();

        return ReceiptCategory::with([
            'receipts' => function ($query) use ($startOfWeek, $endOfWeek) {
                $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            },
            'children.receipts' => function ($query) use ($startOfWeek, $endOfWeek) {
                $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            }
        ])->get();
    }

}
