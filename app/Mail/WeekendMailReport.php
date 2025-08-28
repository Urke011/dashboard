<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeekendMailReport extends Mailable
{
    use Queueable, SerializesModels;

    public $categoriesData;
    public $foodSubcategories;

    public function __construct($categoriesData, $foodSubcategories)
    {
        $this->categoriesData = $categoriesData;
        $this->foodSubcategories = $foodSubcategories;
    }

    public function build()
    {
        return $this->subject('Weekend Spending Report')
            ->view('emails.report');
    }
}
