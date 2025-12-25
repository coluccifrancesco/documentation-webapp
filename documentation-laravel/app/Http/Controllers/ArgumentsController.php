<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Difficulty;
use Illuminate\Http\Request;

class ArgumentsController extends Controller {
    
    public function index() {

        $arguments = Argument::all();
        return view('arguments.index', compact('arguments'));
    }

    // Show the form for creating a new resource
    public function create()    {

        // get difficulties
        $difficulties = Difficulty::all();
        
        return view('arguments.create', compact('difficulties'));
    }

    
    // Store a newly created resource in storage
    public function store(Request $request){
        
        $data = $request->all();
        $newArgument = new Argument();

        $newArgument->name = $data['name'];
        $newArgument->resume = $data['resume'];
        $newArgument->md_text = $data['md_text'];
        $newArgument->difficulty_id = $data['difficulty_id'];
        $newArgument->documentation_link = $data['documentation_link'];

        $newArgument->save();

        return redirect()->route('arguments.show', $newArgument);
    }

    
    //  Display the specified resource
    public function show(Argument $argument){
        return view('arguments.show', compact('argument'));
    }

    
    // Show the form for editing the specified resource
    public function edit(Argument $argument){

        $difficulties = Difficulty::all();

        return view('arguments.edit', compact('argument', 'difficulties'));
    }

    
    // Update the specified resource in storage
    // public function update(Request $request, Category $category)
    // {
    //     $data = $request->all();

    //     $category->name = $data['name'];
    //     $category->description = $data['description'];

    //     $category->update();

    //     return redirect()->route('categories.show', $category);
    // }

    // Asks if we're sure about deleting the project
    // public function sureOfDestroy(Category $category){

    //     return view('categories.destroy', data: compact('category'));
    // }

    
    // Remove the specified resource from storage
    // public function destroy(Category $category, Project $project) {
    //     if ($category->project()->count() > 0) {
    //         return back()->withErrors(['error' => 'Impossibile eliminare: categoria in uso']);
    //     }
        
    //     $category->delete();
    //     return redirect()->route('categories.index');
    // }
}
