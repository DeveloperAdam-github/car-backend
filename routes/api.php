<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

// Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
//     return view('admin');
// });

Route::get('/manufacturers', [ManufacturerController::class, 'index']);
Route::get('/manufacturer/cars', [CarController::class, 'carQueryByManufacturer']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/car-data', [CarController::class, 'singleCarData']);
Route::get('/search-for-cars', [CarController::class, 'carQueryBySearch']);

Route::get('/manufacturer/car-list', [ManufacturerController::class, 'getCarsByManufacturer']);


