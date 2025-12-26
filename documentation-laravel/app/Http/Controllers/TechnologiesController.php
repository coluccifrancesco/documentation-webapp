<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologiesController extends Controller {
    
    public function index() {

        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }

    //  Show the specified resource
    public function show(Technology $technology){
        return view('technologies.show', compact('technology'));
    }
}
