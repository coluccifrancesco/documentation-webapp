<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;

class DifficultiesController extends Controller {

    public function index() {

        $difficulties = Difficulty::all();
        return view('difficulties.index', compact('difficulties'));
    }

    public function create()    {
        return view('difficulties.create');
    }
    
    public function store(Request $request){
        
        $data = $request->all();
        $newDifficulty = new Difficulty();

        $newDifficulty->grade_name = $data['grade_name'];
        $newDifficulty->grade_numerical = $data['grade_numerical'];

        $newDifficulty->save();

        return redirect()->route('difficulties.show', $newDifficulty);
    }
    
    public function show(Difficulty $difficulty){
        return view('difficulties.show', compact('difficulty'));
    }
    
    public function edit(Difficulty $difficulty){
        return view('difficulties.edit', compact('difficulty'));
    }
    
    public function update(Request $request, Difficulty $difficulty){
        
        $data = $request->all();

        $difficulty->grade_name = $data['grade_name'];
        $difficulty->grade_numerical = $data['grade_numerical'];

        $difficulty->update();

        return redirect()->route('difficulties.show', $difficulty);
    }
    
    public function sureOfDestroy(Difficulty $difficulty){
        return view('difficulties.destroy', data: compact('difficulty'));
    }
   
    public function destroy(Difficulty $difficulty){

        $difficulty->arguments()->update(['difficulty_id' => null]);
        $difficulty->delete();

        return redirect()->route('difficulties.index');
    }
}