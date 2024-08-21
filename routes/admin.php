<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;



Route::resource('cars', CarController::class)->middleware('verified')->only([
   'index','create','store','edit','update','show',
    'destroy','showDeleted','restore','forcedestroy','upload'
]);


