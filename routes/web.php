<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Models\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job:slug}', [JobController::class, 'show']);

Route::get('/tags/{tag:name}', [TagController::class, 'index']);

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('/login', [SessionController::class, 'create']);
  Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
