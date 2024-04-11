<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/', 'home');
Route::view('contact', 'contact');
Route::view('troutrou', 'troutrou');

Route::resource('jobs', JobController::class);
