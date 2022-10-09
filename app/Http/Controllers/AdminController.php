<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();

        Log::debug([$manufacturers, 'what this']);
        
        return view('admin', ['manufacturers' => $manufacturers]);
    }
}
