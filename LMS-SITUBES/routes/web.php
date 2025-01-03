<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProgressController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');

    Route::get('/exams/show/{moduleId}', [ExamController::class, 'show'])->name('exams.show');
    Route::post('/exams/submit', [ExamController::class, 'submit'])->name('exams.submit');
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress');
});


require __DIR__.'/auth.php';
