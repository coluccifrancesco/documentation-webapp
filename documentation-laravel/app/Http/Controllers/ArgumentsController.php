<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Difficulty;
use App\Models\Technology;
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

        // get technologies
        $technologies = Technology::all();
        
        return view('arguments.create', compact('difficulties', 'technologies'));
    }

    
    // Store a newly created resource in storage
    public function store(Request $request){
        
        $data = $request->all();
        $newArgument = new Argument();

        $newArgument->name = $data['name'];
        $newArgument->resume = $data['resume'];
        $newArgument->md_text = $data['md_text'];
        $newArgument->difficulty_id = $data['difficulty_id'];
        // $newArgument->technology_id = $data['technology_id'];
        $newArgument->documentation_link = $data['documentation_link'];

        // dd($data, $request->has('techs'));

        $newArgument->save();

        // After saving the project we can verify tags
        if($request->has('technology_id')) {
            
            // if yes, save them
            $newArgument->technologies()->attach($data['techs']);
        }

        return redirect()->route('arguments.show', $newArgument);
    }

    
    //  Show the specified resource
    public function show(Argument $argument){
        return view('arguments.show', compact('argument'));
    }

    
    // Form for editing the specified resource
    public function edit(Argument $argument){

        $difficulties = Difficulty::all();
        // insert technologies

        return view('arguments.edit', compact('argument', 'difficulties'));
    }

    
    // Update the specified resource in storage
    public function update(Request $request, Argument $argument){
        
        $data = $request->all();

        $argument->name = $data['name'];
        $argument->resume = $data['resume'];
        $argument->md_text = $data['md_text'];
        $argument->difficulty_id = $data['difficulty_id'];
        // insert technologies update
        $argument->documentation_link = $data['documentation_link'];

        $argument->update();

        // after the project update verify if we're receiving tags
        // if($request->has('tags')) {
            
        // tags update
        //     $project->tags()->sync($data['tags']);
        
        // } else {
            
        // if there's no tags, we remove the ones originally attached
        //     $project->tags()->detach();
        // }

        return redirect()->route('arguments.show', $argument);
    }

    // Asks if we're sure about deleting the project
    public function sureOfDestroy(Argument $argument){

        return view('arguments.destroy', data: compact('argument'));
    }

    
    // Remove the specified resource from storage
    public function destroy(Argument $argument){

        // $project->tags()->detach();
        $argument->delete();

        return redirect()->route('arguments.index');
    }
}