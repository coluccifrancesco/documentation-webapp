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

    public function create()    {

        $difficulties = Difficulty::all();
        $technologies = Technology::all();
        
        return view('arguments.create', compact('difficulties', 'technologies'));
    }

    public function store(Request $request){
        
        $data = $request->all();
        $newArgument = new Argument();

        $newArgument->name = $data['name'];
        $newArgument->resume = $data['resume'];
        $newArgument->md_text = $data['md_text'];
        $newArgument->difficulty_id = $data['difficulty_id'];
        $newArgument->documentation_link = $data['documentation_link'];

        $newArgument->save();

        // After saving the project we can verify tags
        if($request->has('techs')) {
            
            // if yes, save them
            $newArgument->technologies()->attach($data['techs']);
        }

        return redirect()->route('arguments.show', $newArgument);
    }

    
    public function show(Argument $argument){
        return view('arguments.show', compact('argument'));
    }

    
    public function edit(Argument $argument){

        $difficulties = Difficulty::all();
        $technologies = Technology::all();

        return view('arguments.edit', compact('argument', 'difficulties', 'technologies'));
    }

    public function update(Request $request, Argument $argument){
        
        $data = $request->all();

        $argument->name = $data['name'];
        $argument->resume = $data['resume'];
        $argument->md_text = $data['md_text'];
        $argument->difficulty_id = $data['difficulty_id'];
        $argument->documentation_link = $data['documentation_link'];

        $argument->update();

        // after the project update verify if we're receiving tags
        if($request->has('techs')) {
            
        // tags update
            $argument->technologies()->sync($data['techs']);
        
        } else {
            
        // if there's no technologies, we remove the ones originally attached
            $argument->tags()->detach();
        }

        return redirect()->route('arguments.show', $argument);
    }

    public function sureOfDestroy(Argument $argument){

        return view('arguments.destroy', data: compact('argument'));
    }

    public function destroy(Argument $argument){

        $argument->technologies()->detach();
        $argument->delete();

        return redirect()->route('arguments.index');
    }
}