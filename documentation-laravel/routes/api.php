<?php

use App\Http\Controllers\Api\ArgumentsController;
use App\Http\Controllers\Api\DifficultiesController;
use App\Http\Controllers\Api\TechnologiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/arguments", [ArgumentsController::class, 'index']);
Route::get("/arguments/{argument}", [ArgumentsController::class, 'show']);

Route::get('/technologies', [TechnologiesController::class, 'index']);
Route::get('/technologies/{technology}', [TechnologiesController::class, 'show']);

Route::get('/difficulties', [DifficultiesController::class, 'index']);
Route::get('/difficulties/{difficulty}', [DifficultiesController::class, 'show']);