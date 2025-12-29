<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Difficulty;
use Illuminate\Http\Request;

class DifficultiesController extends Controller {
    
    public function index() {

        $difficulties = Difficulty::with('arguments')->get();

        return response()->json(
            [
                "success" => true,
                "data" => $difficulties
            ]
        );
    }

    public function show(Difficulty $difficulty) {

        $difficulty->load('arguments');

        return response()->json(
            [
                "success" => true,
                "data" => $difficulty
            ]
        );
    }
}
