<?php

namespace App\Console\Commands;

use App\Http\Controllers\StockController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

class RefreshDashboardData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:refresh';
    protected $description = 'Calls API methods for dashboard at 7am';

    public function handle()
    {

        $controller = app(StockController::class);
        $controller->TaskScheduleCron();

    }
}

