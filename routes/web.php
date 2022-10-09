<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/create-car', [CarController::class, 'store']);
Route::post('/create-manufacturer', [ManufacturerController::class, 'store']);