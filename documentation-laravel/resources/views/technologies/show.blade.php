@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex align-items-center justify-content-between mt-5 mb-2">
            <div class="rounded px-4 py-2" style="background-color: {{ $technology->bg_color }}; color:{{ $technology->font_color }}">
                <h1 class="mb-0">{{ $technology->name }}</h1>
            </div>

            <div class="d-flex align-items-center gap-3">
                @auth
                    @if (Auth::user()->role === 'admin')

                        <a href="{{ route('technologies.edit', $technology->id) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                        </a>

                        <a href="{{ route('technologies.sureOfDestroy', $technology->id) }}">
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </a>

                    @endif
                @endauth

                <a href="{{ route('technologies.index') }}">
                    <button class="btn btn-primary">
                        Go back
                        <i class="ms-1 fa-solid fa-arrow-left"></i>
                    </button>
                </a>
            </div>
        </div>


        <p class="col-12 col-sm-7">{{ $technology->resume }}</p>
    </div>

@endsection