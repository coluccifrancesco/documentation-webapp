<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologiesController extends Controller {
    
    public function index() {

        $technologies = Technology::with('arguments')->get();

        return response()->json(
            [
                "success" => true,
                "data" => $technologies
            ]
        );
    }

    public function show(Technology $technology) {

        $technology->load('arguments');

        return response()->json(
            [
                "success" => true,
                "data" => $technology
            ]
        );
    }
}
