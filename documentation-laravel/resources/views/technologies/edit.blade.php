@extends('layouts.app')

@section('content')

    @auth
        @if (Auth::user()->role === 'admin')
            <form action="{{ route('technologies.update', $technology) }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto mt-5 border rounded p-4">
                @csrf
                @method('PUT')

                <h2>Edit {{ $technology->name }}</h2>

                <div class="form-control mb-3 mt-4 d-flex align-items-start flex-column">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-100" value="{{ $technology->name }}">
                </div>

                <div class="form-control my-3 d-flex align-items-start flex-column">
                    <label for="resume">Resume</label>
                    <textarea type="text" name="resume" id="resume" class="w-100">{{ $technology->resume }}"</textarea>
                </div>

                <div class="form-control my-3 d-flex align-items-start flex-column">
                    <label for="official_page_link">Official Page link</label>
                    <input type="text" name="official_page_link" id="official_page_link" class="w-100" value="{{ $technology->official_page_link }}">
                </div>

                 <div class="form-control my-2 d-flex justify-content-between align-items-start ">
                    <label for="bg-color">Background</label>
                    <input 
                        type="color" 
                        name="bg_color" 
                        id="bg-color"
                        value="{{ $technology->bg_color }}"
                    >
                    </input>
                </div>

                <div class="form-control my-2 d-flex justify-content-between align-items-start ">
                    <label for="font-color">Font</label>
                    <input 
                        type="color" 
                        name="font_color" 
                        id="font-color"
                        value="{{ $technology->font_color }}"
                    >
                    </input>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn btn-primary" type="button">
                        <a href="{{ route('technologies.index') }}" class="text-white link-underline link-underline-opacity-0">Go back<i class="ms-2 fa-solid fa-arrow-left"></i></a>
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
