<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerAdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\JobAdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Oauth
Route::get('/auth/google/redirect', [GoogleController::class, 'googleRedirect'])->name('login.google');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallback']);

Route::get('/auth/github/redirect', [GithubController::class, 'githubRedirect'])->name('login.github');
Route::get('/auth/github/callback', [GithubController::class, 'githubCallback']);

// Login
Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('/login', [SessionController::class, 'create'])->name('login');
  Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Index Web
Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('/search', SearchController::class);

// Create Jobs
Route::middleware('auth', 'employer')->group(function () {
  Route::get('/jobs/create', [JobController::class, 'create']);
  Route::post('/jobs', [JobController::class, 'store']);
});

Route::get('/jobs/{job:slug}', [JobController::class, 'show']);
Route::get('/tags/{tag:name}', [TagController::class, 'index']);

// Employer Panel
Route::middleware('auth',)->group(function () {
  Route::get('/employer', [EmployerController::class, 'index'])->name('employer.index');
  Route::get('employer/create', [EmployerController::class, 'create'])->name('employer.create');
  Route::post('/employer', [EmployerController::class, 'store']);
});

// Admin Panel
Route::middleware('auth', 'admin')->group(function () {
  Route::get('/admin', function () {
    return view('admin.index');
  })->name('admin');
  Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
  Route::put('/admin/users/{user}', [AdminController::class, 'update']);
  Route::delete('/admin/{user}', [AdminController::class, 'destory']);

  Route::get('/admin/jobs', [JobAdminController::class, 'index'])->name('admin.jobs');
  Route::get('/admin/jobs/{job}/edit', [JobAdminController::class, 'edit'])->name('admin.jobs.edit');
  Route::put('/admin/jobs/{job}', [JobAdminController::class, 'update']);
  Route::delete('/admin/jobs/{job}', [JobAdminController::class, 'destroy']);

  Route::get('/admin/employers', [EmployerAdminController::class, 'index'])->name('admin.employers');
  Route::delete('/admin/employers/{employer}', [EmployerAdminController::class, 'destroy']);

  Route::get('/admin/logs', [AdminController::class, 'logs'])->name('admin.logs');

  Route::get('admin/reports', [PrintController::class, 'index'])->name('admin.reports');
  Route::get('admin/reports/pdf', [PrintController::class, 'generatePDF'])->name('admin.reports.pdf');
  Route::get('admin/reports/excel', [PrintController::class, 'generateExcel'])->name('admin.reports.excel');
});
