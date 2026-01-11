@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex align-items-center justify-content-between mt-5 mb-2">
            {{-- Difficulties showed by emojis and colors on a numerical scale --}}
            @if ($difficulty->grade_numerical == 1)
                <div class="border rounded bg-success text-white p-4 d-flex gap-2 align-items-center justify-content-between">
                    <h1 class="mb-0">{{ $difficulty->grade_name }}</h1>
                    <h2 class="mb-0 mx-4">{{ $difficulty->grade_numerical }}</h2>
                    <i class="fa-solid fa-face-laugh-beam"></i>
                </div>
            @elseif ($difficulty->grade_numerical == 2)
                <div class="border rounded bg-success text-white p-4 d-flex gap-2 align-items-center justify-content-between">
                    <h1 class="mb-0">{{ $difficulty->grade_name }}</h1>
                    <h2 class="mb-0 mx-4">{{ $difficulty->grade_numerical }}</h2>
                    <i class="fa-solid fa-face-grin-wink"></i>
                </div>
            @elseif ($difficulty->grade_numerical == 3)
                <div class="border rounded bg-warning text-dark p-4 d-flex gap-2 align-items-center justify-content-between">
                    <h1 class="mb-0">{{ $difficulty->grade_name }}</h1>
                    <h2 class="mb-0 mx-4">{{ $difficulty->grade_numerical }}</h2>
                    <i class="fa-solid fa-face-grin-beam-sweat"></i>
                </div>
            @elseif ($difficulty->grade_numerical == 4)
                <div class="border rounded bg-warning text-dark p-4 d-flex gap-2 align-items-center justify-content-between">
                    <h1 class="mb-0">{{ $difficulty->grade_name }}</h1>
                    <h2 class="mb-0 mx-4">{{ $difficulty->grade_numerical }}</h2>
                    <i class="fa-regular fa-face-grimace"></i>
                </div>
            @elseif ($difficulty->grade_numerical > 4)
                <div class="border rounded bg-danger text-white p-4 d-flex gap-2 align-items-center justify-content-between">
                    <h1 class="mb-0">{{ $difficulty->grade_name }}</h1>
                    <h2 class="mb-0 mx-4">{{ $difficulty->grade_numerical }}</h2>
                    <i class="fa-solid fa-face-dizzy"></i>
                </div>
            @endif

            <div class="d-flex align-items-center gap-3">
                @auth
                    <a href="{{ route('difficulties.edit', $difficulty->id) }}">
                        <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                    </a>

                    <a href="{{ route('difficulties.sureOfDestroy', $difficulty->id) }}">
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </a>

                @endauth

                <a href="{{ route('difficulties.index') }}">
                    <button class="btn btn-primary">
                        Go back
                        <i class="ms-1 fa-solid fa-arrow-left"></i>
                    </button>
                </a>
            </div>
        </div>


        <p class="col-12 col-sm-7">{{ $difficulty->resume }}</p>
    </div>

@endsection