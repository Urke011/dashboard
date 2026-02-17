<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Todo;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Weather;

class StockController extends Controller
{
    public function TaskScheduleCron(){
        //update stocks and weather on dashboard
         $allWeatherRecords = $this->getWeather();
         $stocks = $this->getStocks();
         $this->getAllDashboardValue();
    }
    public function getAllDashboardValue()
    {
        $currentDateTime = $this->currentTime();
        $currentDateTime = str_replace('-', '/', $currentDateTime);
        list($date, $time) = explode(" ", $currentDateTime);

        $date = substr($date, 0, 10);

        $allWeatherRecords = $this->showAllWeatherValues();
        $stocks = $this->selectSavedStock();
        $todos = $this->getAllTodoTasks();

        return view('dashboard', [
            'weatherRecords' => $allWeatherRecords,
            'date' => $date,
            'time' => $time,
            'stocks' => $stocks,
            'allTodoTasks' => $todos,
        ]);
    }


    public function getStocks()
{
    $apiKey = config('services.api_stock_service.key');
    $symbols = ["MSFT", "AAPL", "KO", "GM", "MCD"];
    $client = new Client();

    try {
        foreach ($symbols as $symbol) {
            // EODHD GLOBAL QUOTE endpoint
            $apiUrl = "https://eodhd.com/api/real-time/{$symbol}?api_token={$apiKey}&fmt=json";

            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody(), true);
        
            if (!isset($data['close']) || !isset($data['volume'])) {
                \Log::warning("Stock data missing for {$symbol}");
                continue;
            }

            $stockData = [
                'stockSymbol'   => $symbol,
                'LastRefreshed' => now()->format('d/m/Y'),
                'high'          => round($data['high'], 2),
                'volume'        => $data['volume'] ?? 0,
            ];

            Stock::updateOrCreate(
                ['stockSymbol' => $symbol],
                $stockData
            );

            usleep(200000);
        }

        return Stock::all();

    } catch (\Exception $e) {
        \Log::error("Error fetching stocks: " . $e->getMessage());
        return [];
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

    public function getWeather()
    {
        $apiKey = config('services.api_weather_service.key');
        $client = new Client();
        $cities = [
            'Nuremberg' => '2867714',
            'Belgrade' => '792680',
            'Havana' => '3553478'
        ];
        try {
            foreach ($cities as $town => $cityId) {
                $request = "https://api.openweathermap.org/data/2.5/forecast?id={$cityId}&appid={$apiKey}";
                $response = $client->get($request);
                $data = json_decode($response->getBody(), true);
                // Convert temperature from Kelvin to Celsius
                $kelvinTemp = $data['list'][0]['main']['temp'];
                $celsiusTemp = $kelvinTemp - 273.15;
                $celsiusTemp = round($celsiusTemp, 0);

                // Insert or update the weather data for each town
                Weather::updateOrCreate(
                    ['town' => $town],
                    ['weather' => $celsiusTemp]
                );
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return [];
        }
        return $allWeatherRecords = Weather::all()->toArray();
    }

    private function showAllWeatherValues()
    {
        return $allWeatherRecords = Weather::all()->toArray();
    }

    private function getAllTodoTasks()
    {
        return $todos = Todo::all()->toArray();
    }

    public function createTodoTaskInputs()
    {
        return view('todo.create');
    }

    public function storeTodoTaskInputs(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_complete' => 'nullable|boolean',
        ]);

        Todo::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'is_complete' => $validatedData['is_complete'] ?? false,  // Default to false if no value is provided
        ]);

        return redirect()->route('welcome')->with('success', 'Todo task created successfully!');
    }

    public function editTodoTask($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    public function updateTodoTask(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_complete' => 'nullable|boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'is_complete' => $validatedData['is_complete'] ?? false,
        ]);

        return redirect()->route('welcome')->with('success', 'Todo task updated successfully!');
    }

    public function deleteTodoTask($id)
    {
        $task = Todo::findOrFail($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
        //return response()->json(null, 204);
    }

}
