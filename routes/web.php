<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job:slug}', [JobController::class, 'show']);

// Route::get('/', [JobController::class, 'search']);