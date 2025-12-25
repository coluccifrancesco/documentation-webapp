@extends('layouts.app')
@section('content')

    <div class="mx-auto container">

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
            
        {{-- 
            RIVEDERE IL DESIGN DATO CHE LE CARATTERISTICHE DEGLI 
            ARGOMENTI HANNO LO STESSO ASPETTO DEI BOTTONI 
        --}}
    
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
                                    <p class="mb-0">MD present</p>
                                </div>
                            @else
                                <div class="border rounded bg-danger text-white p-2">
                                    <p class="mb-0">No MD</p>
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
                                    <a href="{{ route('arguments.edit', $argument->id) }}">
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                                    </a>

                                    <a href="{{ route('arguments.show', $argument->id) }}">
                                        <button class="btn btn-success">Show</button>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete {{ $argument->name }}?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                    
                                                    <form action="{{ route('arguments.destroy', $argument->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                        <input type="submit" class="btn btn-danger" value="Delete {{ $argument->name }}"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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