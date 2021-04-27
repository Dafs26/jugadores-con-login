<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowHomes;




Route::get('/', function () {return view('welcome');})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowHomes::class)->name('dashboard');