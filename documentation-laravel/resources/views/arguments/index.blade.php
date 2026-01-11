@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="mt-4 mx-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Argument's list</h2>

            @auth
                {{-- Example of previous used alternative that authorized only "admin" 
                users to access every data-managing page or element 
                
                @if(Auth::user()->role === "admin")
                    ...
                @endif --}}

                <a href="{{ route('arguments.create') }}" class="">
                        <button class="btn btn-success">Create new argument</button>
                </a>
            @endauth
        </div>

        <div class="row mx-auto">
            @foreach ($arguments as $argument)
                <div class="col-12 col-md-6 my-3">
                    <div class="border rounded p-3 h-100">
                        <h3 class="mb-1">{{ $argument->name }}</h3>

                        <p class="mb-0">{{ $argument->resume }}</p>

                        <div class="d-flex justify-content-between align-items-center my-3">
                            @if ($argument->difficulty?->grade_numerical === null)
                            <div class="border rounded bg-dark text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                                <p class="mb-0">No diff</p>
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            @elseif ($argument->difficulty->grade_numerical == 1)
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
                            @elseif ($argument->difficulty->grade_numerical === null)
                            <div class="border rounded bg-dark text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                                <p class="mb-0">No diff</p>
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            @endif

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

                        @auth
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <a href="{{ route('arguments.edit', $argument->id) }}">
                                <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                            </a>

                            <a href="{{ route('arguments.show', $argument->id) }}">
                                <button class="btn btn-success">Show</button>
                            </a>

                            <a href="{{ route('arguments.sureOfDestroy', $argument->id) }}">
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </a>
                        </div>
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