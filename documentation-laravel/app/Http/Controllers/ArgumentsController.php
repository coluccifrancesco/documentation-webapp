<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use Illuminate\Http\Request;

class ArgumentsController extends Controller {
    
    public function index() {

        $arguments = Argument::all();
        return view('arguments.index', compact('arguments'));
    }

    // template from Boolean lessons

    // Show the form for creating a new resource
    // public function create()
    // {
    //     return view('categories.create');
    // }

    
    // Store a newly created resource in storage
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $newCategory = new Category();

    //     $newCategory->name = $data['name'];
    //     $newCategory->description = $data['description'];

    //     $newCategory->save();

    //     return redirect()->route('categories.show', $newCategory);
    // }

    
    //  Display the specified resource
    // public function show(Category $category)
    // {
    //     return view('categories.show', compact('category'));
    // }

    
    // Show the form for editing the specified resource
    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }

    
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
