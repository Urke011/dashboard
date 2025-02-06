<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    // Define the fillable fields so that we can use mass assignment
    protected $table = 'weather_map_belgrade';
    protected $fillable = ['town', 'weather'];
}
