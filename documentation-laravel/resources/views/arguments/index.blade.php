@extends('layouts.app')
@section('content')

    <div class="container mx-auto">

        <div class="mt-4 mx-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Argument's list</h2>
    
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="" class="">
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

                        <div class="border rounded bg-dark text-white p-2 my-3">
                            <p class="mb-0">{{ $argument->md_text }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            
                            <p>
                                {{-- Implementare le difficoltà --}}
                            </p>

                            <a href="{{ $argument->documentation_link }}">
                                <button class="btn btn-primary">{{ $argument->name }}: docs</button>
                            </a>
                        </div>

                    </div>
                </div>    
            @endforeach
        
        </div>
    
    </div>

@endsection