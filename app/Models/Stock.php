<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
     // Define the fillable fields so that we can use mass assignment
     protected $fillable = [
        'symbol',
        'latest-price',
        'latestTime',
        'latest-data',
         'imagePath'
    ];

    // Cast the JSON field to an array
    protected $casts = [
        'latest-data' => 'array',
    ];
}
