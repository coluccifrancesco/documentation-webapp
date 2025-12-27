<?php

use App\Http\Controllers\ArgumentsController;
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



// Post - Arguments
Route::post('/argument/create', [ArgumentsController::class, 'store'])->name('arguments.store');

// Post - Technologies
Route::post('/technology/create', [TechnologiesController::class, 'store'])->name('technologies.store');



// Put - Arguments
Route::put('/argument/{argument}', [ArgumentsController::class, 'update'])->name('arguments.update');

// Put - Technologies
Route::put('/technology/{technology}', [TechnologiesController::class, 'update'])->name('technologies.update');



// Delete - Arguments
Route::delete('/argument/{argument}/destroy', [ArgumentsController::class, 'destroy'])->name('arguments.destroy');

// Delete - Technologies
Route::delete('/technology/{technology}/destroy', [TechnologiesController::class, 'destroy'])->name('technologies.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';