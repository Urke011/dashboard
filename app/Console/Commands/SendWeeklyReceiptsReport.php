<?php

namespace App\Console\Commands;


use App\Http\Controllers\ReceiptController;
use Illuminate\Console\Command;

class SendWeeklyReceiptsReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-weekly-receipts-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = app(ReceiptController::class);
        $controller->sendWeekendSpendingMail();
    }
}
