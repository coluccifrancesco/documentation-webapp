@extends('layouts.app')

@section('content')

    @auth
        @if (Auth::user()->role === 'admin')
            
            <form action="{{ route('difficulties.update', $difficulty->id) }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto mt-5 border rounded p-4">
                @csrf
                @method('PUT')
                
                <h2>Create new Difficulty</h2>

                <div class="d-block d-lg-flex justify-content-center align-items-between gap-4">
                    <div class="form-control mb-3 mt-4 d-flex align-items-center justify-content-between gap-4">
                        <label for="grade_name">Name</label>
                        <input type="text" name="grade_name" id="grade_name" value="{{ $difficulty->grade_name }}">
                    </div>

                    <div class="form-control mb-3 mt-4 d-flex align-items-center justify-content-between">
                        <label for="grade_numerical">Number</label>
                        <input type="number" name="grade_numerical" id="grade_numerical" min="1" max="5" value="{{ $difficulty->grade_numerical }}">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn btn-primary" type="button">
                        <a href="{{ route('difficulties.index') }}" class="text-white link-underline link-underline-opacity-0">Go back<i class="ms-2 fa-solid fa-arrow-left"></i></a>
                    </button>
                    
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
        
        @else
        
            <div class="d-flex justify-content-around align-items-center flex-column my-5">
                <h1 class="mb-0" style="font-size: 4rem;">Error 404</h1>
                <h5 class="text-secondary" style="font-size: 1.4rem;">The page does not exist</h5>
                
                <a href="{{ url('/') }}" class="mt-4">
                    <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
                </a>
            </div>
        
        @endif

    @endauth

    @guest
        <div class="d-flex justify-content-around align-items-center flex-column my-5">
            <h1 class="mb-0" style="font-size: 4rem;">Error 404</h1>
            <h5 class="text-secondary" style="font-size: 1.4rem;">The page does not exist</h5>
                
            <a href="{{ url('/') }}" class="mt-4">
                <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
            </a>
        </div>
    @endguest

@endsection
