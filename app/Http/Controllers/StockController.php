<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function getStock()
    {
        // Create a new Guzzle client instance
        $client = new Client();
        $apiKey = "8QC2J7FW2O3V95BI"; // Your Alpha Vantage API Key
        $symbol = "AAPL";
        $interval = "5min"; // Use a supported interval like 1min, 5min, 15min, etc.

        //max-request = 25 requests per day(modify)
        try {
            $apiUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval={$interval}&apikey={$apiKey}";
            $lastRequestFile = base_path('last_request_time.txt');
            if (file_exists($lastRequestFile)) {
                $lastRequestTime = (int)file_get_contents($lastRequestFile);
            } else {
                $lastRequestTime = 0; // If the file doesn't exist, set it to 0
            }
            $currentTime = time();
            // Calculate the time difference in seconds (86400 seconds in a day)
            $timeDifference = $currentTime - $lastRequestTime;
            if ($timeDifference >= 86400) {
                // Make a GET request
                $response = $client->get($apiUrl);

                // Get the response body as an array
                $data = json_decode($response->getBody(), true);

                $timeSeries = $data["Time Series ({$interval})"];
                $latestTime = array_key_first($timeSeries); // Get the most recent timestamp
                $latestData = $timeSeries[$latestTime];
                $latestPrice = $latestData['4. close'];
                //insert
                $stock = Stock::updateOrCreate(
                    [
                        'symbol' => $symbol
                    ],
                    [
                        'symbol' => $symbol,
                        'latest-price' => $latestPrice,   // Store latest price
                        'latestTime' => $latestTime,      // Store the timestamp
                        'latest-data' => $latestData,     // Store the entire data as JSON
                    ]
                );
                file_put_contents($lastRequestFile, $currentTime);
            }

            //select all from database
            $stocksAll = Stock::all();
            $stocksAlls = array();
            $companyTickers = $this->getCompanyTickers();
            foreach ($stocksAll as $stock) {
                // Initialize a new property on the stock object for the title
                $stock->title = null; // You can set it to null or an empty string initially

                foreach ($companyTickers as $ticker) {
                    if ($stock->symbol === $ticker->stockSymbol) {
                        // Assign the stock title from the ticker
                        $stock->title = $ticker->stockTitle;
                        break; // Exit the loop once we find the matching ticker
                    }
                }
                $stocksAlls[] = $stock;
            }

            return view('dashboard', ['stocks' => $stocksAlls]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('dashboard', ['error' => $e->getMessage()]);
        }
    }

    public function getCompanyTickers()
    {
        $json = file_get_contents(base_path('company_tickers.json'));
        $data = json_decode($json, TRUE);
        $preparedData = [];

        foreach ($data as $company) {
            // Check if the company with the same 'centralIndexKey' already exists
            $exists = DB::table('stocks_symbols')
                ->where('centralIndexKey', $company['cik_str'])
                ->exists();
            // If it doesn't exist, prepare the array for insertion
            if (!$exists) {
                $preparedData[] = [
                    'centralIndexKey' => $company['cik_str'],
                    'stockSymbol' => $company['ticker'],
                    'stockTitle' => $company['title']
                ];
            }
        }

        // Insert only the new records into the database
        if (!empty($preparedData)) {
            DB::table('stocks_symbols')->insert($preparedData);
        }

        // Retrieve and return all the records from the table
        $allSymbols = DB::table('stocks_symbols')->get();

        return $allSymbols;
    }

}
