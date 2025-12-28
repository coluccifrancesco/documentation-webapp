<?php

use App\Http\Controllers\ArgumentsController;
use App\Http\Controllers\DifficultiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Get - Arguments 
Route::get('/argument', [ArgumentsController::class, 'index'])->name('arguments.index');
Route::get('/argument/create', [ArgumentsController::class, 'create'])->name('arguments.create');
Route::get('/argument/{argument}', [ArgumentsController::class, 'show'])->name('arguments.show');
Route::get('/argument/{argument}/edit', [ArgumentsController::class, 'edit'])->name('arguments.edit');
Route::get('/argument/{argument}/areyousure', [ArgumentsController::class, 'sureOfDestroy'])->name('arguments.sureOfDestroy');

// Get - Technologies 
Route::get('/technology', [TechnologiesController::class, 'index'])->name('technologies.index');
Route::get('/technology/create', [TechnologiesController::class, 'create'])->name('technologies.create');
Route::get('/technology/{technology}', [TechnologiesController::class, 'show'])->name('technologies.show');
Route::get('/technology/{technology}/edit', [TechnologiesController::class, 'edit'])->name('technologies.edit');
Route::get('/technology/{technology}/areyousure', [TechnologiesController::class, 'sureOfDestroy'])->name('technologies.sureOfDestroy');

// Get - Difficulties 
Route::get('/difficulty', [DifficultiesController::class, 'index'])->name('difficulties.index');
Route::get('/difficulty/create', [DifficultiesController::class, 'create'])->name('difficulties.create');
Route::get('/difficulty/{difficulty}', [DifficultiesController::class, 'show'])->name('difficulties.show');
Route::get('/difficulty/{difficulty}/edit', [DifficultiesController::class, 'edit'])->name('difficulties.edit');
Route::get('/difficulty/{difficulty}/areyousure', [DifficultiesController::class, 'sureOfDestroy'])->name('difficulties.sureOfDestroy');



// Post - Arguments
Route::post('/argument/create', [ArgumentsController::class, 'store'])->name('arguments.store');

// Post - Technologies
Route::post('/technology/create', [TechnologiesController::class, 'store'])->name('technologies.store');

// Post - Difficulties
Route::post('/difficulty/create', [DifficultiesController::class, 'store'])->name('difficulties.store');



// Put - Arguments
Route::put('/argument/{argument}', [ArgumentsController::class, 'update'])->name('arguments.update');

// Put - Technologies
Route::put('/technology/{technology}', [TechnologiesController::class, 'update'])->name('technologies.update');

// Put - Difficulties
Route::put('/difficulty/{difficulty}', [DifficultiesController::class, 'update'])->name('difficulties.update');



// Delete - Arguments
Route::delete('/argument/{argument}/destroy', [ArgumentsController::class, 'destroy'])->name('arguments.destroy');

// Delete - Technologies
Route::delete('/technology/{technology}/destroy', [TechnologiesController::class, 'destroy'])->name('technologies.destroy');

// Delete - Difficulties
Route::delete('/difficulty/{difficulty}/destroy', [DifficultiesController::class, 'destroy'])->name('difficulties.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';