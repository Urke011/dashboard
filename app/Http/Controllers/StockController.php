<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Todo;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Weather;
use Illuminate\Support\Facades\Cache;

class StockController extends Controller
{
    public function getAllDashboardValue()
    {

        //current date and time
        $currentDateTime = $this->currentTime();
        //format date
        $currentDateTime = str_replace('-', '/', $currentDateTime);
        // Explode the string into date and time
        list($date, $time) = explode(" ", $currentDateTime);

        // call api only 2 times per day
        $directory = storage_path('app/logs');
        $filename = $directory . "/call_log.json";

        // Ensure the directory exists
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        if (file_exists($filename)) {
            $data = json_decode(file_get_contents($filename), true);
            $lastCallDate = $data['date'] ?? '';
            $callCount = $data['count'] ?? 0;
        } else {
            $lastCallDate = '';
            $callCount = 0;
        }

        $currentDate = date('Y-m-d');

        if ($lastCallDate !== $currentDate) {
            $callCount = 0; // Reset count for a new day
        }

        if ($callCount < 2) {
            $allWeatherRecords = $this->getWeather();
            $stocks = $this->getStocks();
            $data = ['date' => $currentDate, 'count' => $callCount + 1];
            file_put_contents($filename, json_encode($data));
        } else {
            $allWeatherRecords = $this->showAllWeatherValues();
            $stocks = $this->selectSavedStock();
            //echo "Method already called twice today.";
        }
        $allTodoTasks = $this->getAllTodoTasks();
        //dd($allTodoTasks);


        return view('dashboard', ['weatherRecords' => $allWeatherRecords, 'date' => $date, 'time' => $time
            , 'stocks' => $stocks, 'allTodoTasks'=> $allTodoTasks
        ]);
    }

    private function getStocks()
    {
        $apiKey = "OWACIBRHVEIVW5RO"; // Your Alpha Vantage API Key
        $symbol = "MSFT";
        $interval = "5min"; // Use a supported interval like 1min, 5min, 15min, etc.
        //max-request = 25 requests per day(modify)
        try {
            $apiUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval={$interval}&apikey={$apiKey}";
            // Make a GET request
            $response = file_get_contents($apiUrl); // Send the request
            $data = json_decode($response, true); // Decode the response to an associative array
            $timeSeries = $data['Time Series (5min)'];
            $firstKey = array_key_first($timeSeries); // Get the first datetime key

            $stockSymbol = $data['Meta Data']['2. Symbol'];
            $LastRefreshed = $data['Meta Data']['3. Last Refreshed'];
            $LastRefreshed = date('d/m/Y', strtotime($LastRefreshed));
            $high = $timeSeries[$firstKey]['2. high'];
            $high = round($high, 0);
            $volume = $timeSeries[$firstKey]['5. volume'];

            //insert (sometimes work only this insert method)
            $data = [
                'stockSymbol' => $stockSymbol,
                'LastRefreshed' => $LastRefreshed,
                'high' => $high,
                'volume' => $volume
            ];
            Stock::updateOrCreate(
                ['stockSymbol' => $stockSymbol],
                $data
            );

            return $stock = Stock::all();

        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('dashboard', ['error' => $e->getMessage()]);
        }
    }

    private function selectSavedStock()
    {
        return $stock = Stock::all();
    }

    private function currentTime(): string
    {
        // Set the correct timezone if needed
        date_default_timezone_set('Europe/Berlin');
        $date = date('d-m-Y H:i:s');
        return $date;
    }

    private function getWeather()
    {
        $apiKey = "37665afbf0f3683dfbd56bf04678a0f1";
        $client = new Client();
        $belgradeId = '792680';
        $havanaId = '3553496';
        $nurnbergId = '2867714';
        $town = 'Belgrade';
        try {
            $request = "https://api.openweathermap.org/data/2.5/forecast?id={$belgradeId}&appid={$apiKey}";
            // Make a GET request
            $response = $client->get($request);
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Convert temperature from Kelvin to Celsius if needed
            $kelvinTemp = $data['list'][0]['main']['temp'];
            $celsiusTemp = $kelvinTemp - 273.15;
            $celsiusTemp = round($celsiusTemp, 0);
            // Insert or update the weather data for the town

            Weather::updateOrCreate(
                ['town' => $town], // Search by town
                ['weather' => $celsiusTemp] // Update the weather value (temperature)
            );
            return $allWeatherRecords = Weather::all();

        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('dashboard', ['error' => $e->getMessage()]);
        }
    }

    private function showAllWeatherValues()
    {
        return $allWeatherRecords = Weather::all();
    }

    private function getAllTodoTasks()
    {
       return $todos = Todo::all()->toArray();
    }

}
