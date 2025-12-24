<?php

use App\Http\Controllers\ArgumentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Get - Arguments 
Route::get('/', [ArgumentsController::class, 'index'])->name('arguments.index');

Route::get('/argument/create', [ArgumentsController::class, 'create'])->name('arguments.create');

Route::get('/argument/{argument}', [ArgumentsController::class, 'show'])->name('arguments.show');

// Route::get('/argument/{argument}/edit', [ArgumentsController::class, 'edit'])->name('arguments.edit');

// Route::get('/argument/{argument}/areyousure', [ArgumentsController::class, 'sureOfDestroy'])->name('arguments.sureOfDestroy');



// Post - Arguments
Route::post('/argument/create', [ArgumentsController::class, 'store'])->name('arguments.store');



// Put - Arguments
// Route::put('/argument/{argument}', [ArgumentsController::class, 'update'])->name('arguments.update');



// Delete - Arguments
// Route::delete('/argument/{argument}/destroy', [ArgumentsController::class, 'destroy'])->name('arguments.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';