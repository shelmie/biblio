<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\titi2Controller;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/pageac', function () {
//     return view('index');
// });

Route::get('/livre', [PageController::class, 'livre'])->name('voir');

Route::get('/verstiti', [titi2Controller::class, 'affichetiti']); 