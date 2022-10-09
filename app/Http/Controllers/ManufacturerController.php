<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ManufacturerController extends Controller
{

    public function index()
    {
        $manufacturers = Manufacturer::orderBy('name', 'asc')->get()->all();

        return $manufacturers;
    }
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);
            $url = URL::to('/') . '/public/images/' . $filename;
            $image['url'] = $url;
        }
        
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request->name;
        $manufacturer->logo = $url;
        $manufacturer->save();

        return $manufacturer;
    }
    public function manufacturerQueryByManufacturer()
    {
        $manufacturer = Manufacturer::where('name', 'Ferrari')->get();

        return $manufacturer;
    }

    public function getCarsByManufacturer()
    {
        $cars = Manufacturer::where('name', 'Ferrari')->with('cars')->get();

        return $cars;
    }
}
