<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('dashboard:refresh')->dailyAt('07:00')->timezone('Europe/Berlin');
Schedule::command('app:send-weekly-receipts-report')->weeklyOn(1, '7:00')->timezone('Europe/Berlin');
