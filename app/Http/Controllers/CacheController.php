<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function resetCache()
    {
        Artisan::call('cache:clear');
        return redirect()->route('welcome')->with('success', 'Cache is cleared!');
    }
}
