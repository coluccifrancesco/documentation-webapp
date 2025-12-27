<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologiesController extends Controller {
    
    public function index() {

        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }

    public function create()    {
        return view('technologies.create');
    }

    public function store(Request $request){
        
        $data = $request->all();
        $newTechnology = new Technology();

        $newTechnology->name = $data['name'];
        $newTechnology->resume = $data['resume'];
        $newTechnology->official_page_link = $data['official_page_link'];
        $newTechnology->bg_color = $data['bg_color'];
        $newTechnology->font_color = $data['font_color'];

        $newTechnology->save();

        return redirect()->route('technologies.show', $newTechnology);
    }

    public function show(Technology $technology){
        return view('technologies.show', compact('technology'));
    }

    public function edit(Technology $technology){
        return view('technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology){
        
        $data = $request->all();

        $technology->name = $data['name'];
        $technology->resume = $data['resume'];
        $technology->official_page_link = $data['official_page_link'];
        $technology->bg_color = $data['bg_color'];
        $technology->font_color = $data['font_color'];

        $technology->update();

        return redirect()->route('technologies.show', $technology);
    }

    public function sureOfDestroy(Technology $technology){
        return view('technologies.destroy', data: compact('technology'));
    }

    
    // Remove the specified resource from storage
    public function destroy(Technology $technology){
        
        $technology->arguments()->detach();
        $technology->delete();
        return redirect()->route('technologies.index');
    }
}
