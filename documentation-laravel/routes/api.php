<?php

use App\Http\Controllers\Api\ArgumentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/arguments", [ArgumentsController::class, 'index']);
Route::get("/arguments/{argument}", [ArgumentsController::class, 'show']);