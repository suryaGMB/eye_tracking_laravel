<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EyeTrackController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/eyetrack', [EyeTrackController::class, 'index']);

