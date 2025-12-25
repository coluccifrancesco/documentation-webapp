@extends('layouts.app')
@section('content')

    <div class="container mx-auto">

        <div class="mt-4 mx-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Argument's list</h2>
    
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('arguments.create') }}" class="">
                        <button class="btn btn-success">Create new argument</button>
                    </a>
                @endif
            @endauth
        </div>                
            
    
        <div class="row mx-auto">
            
            @foreach ($arguments as $argument)
                <div class="col-12 col-md-6 my-3">
                    <div class="border rounded p-3 h-100">

                        <h3 class="mb-1">{{ $argument->name }}</h3>

                        <p class="mb-0">{{ $argument->resume }}</p>

                        <div class="d-flex justify-content-between align-items-center my-3">
                            
                            {{-- Difficulties showed by emojis and colors on a numerical scale --}}
                            @if ($argument->difficulty->grade_numerical == 1)
                                <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                                    <i class="fa-solid fa-face-laugh-beam"></i>
                                </div>
                            @elseif ($argument->difficulty->grade_numerical == 2)
                                <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                                    <i class="fa-solid fa-face-grin-wink"></i>
                                </div>
                            @elseif ($argument->difficulty->grade_numerical == 3)
                                <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                                    <i class="fa-solid fa-face-grin-beam-sweat"></i>
                                </div>
                            @elseif ($argument->difficulty->grade_numerical == 4)
                                <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                                    <i class="fa-regular fa-face-grimace"></i>
                                </div>
                            @elseif ($argument->difficulty->grade_numerical > 4)
                                <div class="border rounded bg-danger text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                                    <i class="fa-solid fa-face-dizzy"></i>
                                </div>
                            @endif

                            {{-- Shows if the markdown is present --}}
                            @if ($argument->md_text != null)
                                <div class="border rounded bg-dark text-white p-2">
                                    <p class="mb-0">MD is present</p>
                                </div>
                            @else
                                <div class="border rounded bg-danger text-white p-2">
                                    <p class="mb-0">MD isn't present</p>
                                </div> 
                            @endif

                            <a href="{{ $argument->documentation_link }}">
                                <button class="btn btn-primary">docs</button>
                            </a>
                        
                        </div>

                        {{-- 
                            The section handles the multiple cases of ux
                            if the user is authorized and/or authenticated
                        --}}
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <a href="">
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                                    </a>

                                    <a href="{{ route('arguments.show', $argument->id) }}">
                                        <button class="btn btn-success">Show</button>
                                    </a>
                                    
                                    <a href="">
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </div>
                            @else
                                <div class="mt-3">
                                    <a href="{{ route('arguments.show', $argument->id) }}">
                                        <button class="btn btn-success w-100">Show</button>
                                    </a>
                                </div>
                            @endif
                        @endauth

                        @guest
                            <div class="mt-3">
                                <a href="{{ route('arguments.show', $argument->id) }}">
                                    <button class="btn btn-success w-100">Show</button>
                                </a>
                            </div>
                        @endguest

                    </div>
                </div>    
            @endforeach
        
        </div>
    
    </div>

@endsection