<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased">
      <div class="w-screen h-screen flex flex-col justify-center items-center font-boldHeadline overflow-scroll">
        <form method="post" action="{{url('/create-car')}}" class="w-1/2 items-center flex flex-col border border-gray-400 rounded-lg p-8" enctype="multipart/form-data">
          <h2 class="text-2xl font-bold">Upload a new car</h2>
            @csrf
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Name" name="name">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Model" name="model">
            {{-- <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Manufacturer" name="manufacturer"> --}}
            <select name="manufacturer" id="" class="w-1/2 h-10 text-sm rounded-lg border border-black px-2">
              @foreach ( $manufacturers as $manuf )
              <option value="{{$manuf->name}}">{{$manuf->name}}</option>
              @endforeach
            </select>
            <input type="file" name="location" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="location">
            <input type="file" name="image" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="image">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Engine size" name="engine_size">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Power" name="power">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Capacity" name="capacity">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Max Speed" name="max_speed">
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Price" name="price">
            <label class="w-1/2 mt-4 flex text-left" for="active">
              Engine Type>
            </label>
            <select name="engine_type" id="" class="w-1/2 h-10 text-sm rounded-lg border border-black px-2">
              <option value="Electric">Electric</option>
              <option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
            </select>
            <label class="w-1/2 mt-4 flex text-left" for="active">
              Is car active?
            </label>
            <select name="active" id="" class="w-1/2 h-10 text-sm rounded-lg border border-black px-2">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
            <button class="py-2 px-4 rounded-lg text-white my-4 bg-blue-600">
              Submit
            </button>
          </form>

          <form method="post" action="{{url('/create-manufacturer')}}" class="w-1/2 items-center flex flex-col border border-gray-400 rounded-lg p-8" enctype="multipart/form-data">
            <h2 class="text-2xl font-bold">Upload a new manufacturer</h2>
            @csrf
            <input type="text" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="Name" name="name">
            <input type="file" name="image" class="w-1/2 pl-2 h-10 text-sm rounded-lg border border-black my-2" placeholder="image">

            <button class="py-2 px-4 rounded-lg text-white my-4 bg-blue-600">
              Submit
            </button>
          </form>
        </div>
      </div>
    </body>
</html>
