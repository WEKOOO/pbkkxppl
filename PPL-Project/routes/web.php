<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\LandingPageController;

Route::get('/landingpage', [LandingPageController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

// Route untuk "/dashboard" yang mengarahkan ke fungsi index di LandingPageController
Route::get('/dashboard', [LandingPageController::class, 'index']);

use App\Http\Controllers\Pertemuan3Controller;

Route::get('/pertemuan3', [Pertemuan3Controller::class, 'index']);
Route::get('/pertemuan3/create', [Pertemuan3Controller::class, 'create'])->name('pertemuan3.create');
Route::post('/pertemuan3', [Pertemuan3Controller::class, 'store'])->name('pertemuan3.store');