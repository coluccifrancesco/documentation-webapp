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

                        @if ($argument->md_text != null)
                            <div class="border rounded bg-dark text-white p-2 my-3">
                                <p class="mb-0">MD is present</p>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <p>
                                {{-- Implementare la difficoltà --}}
                            </p>

                            <a href="{{ $argument->documentation_link }}">
                                <button class="btn btn-primary">docs</button>
                            </a>
                        </div>

                        <a href="{{ route('arguments.show', $argument->id) }}">
                            <button class="btn btn-success w-100 my-3">Show</button>
                        </a>

                        @auth
                            @if (Auth::user()->role === 'admin')
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="">
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                                    </a>
                                    
                                    <a href="">
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </div>
                            
                            @endif
                        @endauth
                    </div>
                </div>    
            @endforeach
        
        </div>
    
    </div>

@endsection