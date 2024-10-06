<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Stock;

class StockController extends Controller
{
    public function getStock()
    {
      
      
        // Create a new Guzzle client instance
        $client = new Client();
        $apiKey = "8QC2J7FW2O3V95BI"; // Your Alpha Vantage API Key
        $symbol = "KO";
        $interval = "5min"; // Use a supported interval like 1min, 5min, 15min, etc.

        $apiUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval={$interval}&apikey={$apiKey}"; 
        //max-request = 25 requests per day(modify)
        try {
          /*  
            // Make a GET request to the OpenWeather API
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
                    'symbol' => $symbol,
                    'latest-price' => $latestPrice,   // Store latest price
                    'latestTime' => $latestTime,      // Store the timestamp
                    'latest-data' => $latestData,     // Store the entire data as JSON
                ]
            );
        */
            $stocksAll = Stock::all();
            //dd($stocksAll);
            //select all from database
            return view('dashboard', ['stocks' => $stocksAll]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('dashboard', ['error' => $e->getMessage()]);
        }
    }
}
