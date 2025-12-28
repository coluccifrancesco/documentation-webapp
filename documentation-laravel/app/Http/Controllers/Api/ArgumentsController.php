<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Argument;
use Illuminate\Http\Request;

class ArgumentsController extends Controller {
    
    public function index() {

        $arguments = Argument::with('difficulty', 'technologies')->get();

        return response()->json(
            [
                "success" => true,
                "data" => $arguments
            ]
        );
    }

    public function show(Argument $argument) {

        $argument->load('difficulty', 'technologies');

        return response()->json(
            [
                "success" => true,
                "data" => $argument
            ]
        );
    }
}
