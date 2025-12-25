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

    
    //  Show the specified resource
    public function show(Argument $argument){
        return view('arguments.show', compact('argument'));
    }

    
    // Form for editing the specified resource
    public function edit(Argument $argument){

        $difficulties = Difficulty::all();

        return view('arguments.edit', compact('argument', 'difficulties'));
    }

    
    // Update the specified resource in storage
    public function update(Request $request, Argument $argument){
        
        $data = $request->all();

        $argument->name = $data['name'];
        $argument->resume = $data['resume'];
        $argument->md_text = $data['md_text'];
        $argument->difficulty_id = $data['difficulty_id'];
        $argument->documentation_link = $data['documentation_link'];

        $argument->update();

        return redirect()->route('arguments.show', $argument);
    }

    
    // Remove the specified resource from storage
    public function destroy(Argument $argument){

        $argument->delete();

        return redirect()->route('arguments.index');
    }
}
