<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('name', 'asc')->get()->all();

        return $cars;
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

        $car = new Car;
        $car->name = $request->name;
        $car->model = $request->model;
        $car->manufacturer = $request->manufacturer;
        $car->location = $request->location;
        $car->image = $url;
        $car->engine_size = $request->engine_size;
        $car->power = $request->power;
        $car->capacity = $request->capacity;
        $car->max_speed = $request->max_speed;
        $car->price = $request->price;
        $car->engine_type = $request->engine_type;
        $car->active = $request->active;
        $car->save();

        return $car;

        // return $car;
        // $request->validate([
        //     'name' => 'required',
        //     'model' => 'required',
        //     'manufacturer' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'engine_size' => 'required',
        //     'power' => 'required',
        //     'capacity' => 'required',
        //     'max_speed' => 'required',
        //     'price' => 'required',
        //     'engine_type' => 'required',
        //     'active' => 'required',
        // ]);
  
        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $carImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $carImage);
        //     $input['image'] = "$carImage";
        //     dd('doe this work?');
        // }
    
        // Car::create($input);

        // dd($input);
     
        // return $input;
    }


    public function carQueryByManufacturer()
    {
        $cars = Car::where('manufacturer', 'Ferrari')->get();

        return $cars;
    }

    public function singleCarData(Request $request)
    {
        $carData = Car::Where('id', $request->id)->get();

        return $carData;
    }

    public function carQueryBySearch(Request $request)
    {

        $cars = Car::where('name', 'LIKE', '%' .$request->search.'%')->get();

        return $cars;
    }
}
