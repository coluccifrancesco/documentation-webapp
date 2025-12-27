@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="mt-4 mx-3 row">
            <div class="col-12 col-md-6 my-4">
                <a href="{{ route('arguments.index') }}">
                    <button class="btn btn-primary p-4 mx-auto w-100"><h2 class="mb-0">Arguments</h2></button>
                </a>
            </div>
            
            <div class="col-12 col-md-6 my-4">
                <a href="{{ route('technologies.index') }}">
                    <button class="btn btn-primary p-4 mx-auto w-100"><h2 class="mb-0">Technologies</h2></button>
                </a>
            </div>
        </div>
    </div>

@endsection