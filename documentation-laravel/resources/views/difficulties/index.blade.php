@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="mt-4 mx-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Difficulties list (from 1 to 5)</h2>

            @auth
                <a href="{{ route('difficulties.create') }}">
                    <button class="btn btn-success">Create new difficulty</button>
                </a>
            @endauth
        </div>

        <div class="row mt-3">
            @foreach ($difficulties as $difficulty)
                <div class="col-12 col-lg-6 my-2">
                    <div class="rounded border py-2 px-3 d-flex justify-content-between align-items-center">
                        @if ($difficulty->grade_numerical == 1)
                        <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                            <p class="mb-0">{{ $difficulty->grade_name }}</p>
                            <p class="mb-0 mx-2">{{ $difficulty->grade_numerical }}</p>
                            <i class="fa-solid fa-face-laugh-beam"></i>
                        </div>
                        @elseif ($difficulty->grade_numerical == 2)
                        <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                            <p class="mb-0">{{ $difficulty->grade_name }}</p>
                            <p class="mb-0 mx-2">{{ $difficulty->grade_numerical }}</p>
                            <i class="fa-solid fa-face-grin-wink"></i>
                        </div>
                        @elseif ($difficulty->grade_numerical == 3)
                        <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                            <p class="mb-0">{{ $difficulty->grade_name }}</p>
                            <p class="mb-0 mx-2">{{ $difficulty->grade_numerical }}</p>
                            <i class="fa-solid fa-face-grin-beam-sweat"></i>
                        </div>
                        @elseif ($difficulty->grade_numerical == 4)
                        <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                            <p class="mb-0">{{ $difficulty->grade_name }}</p>
                            <p class="mb-0 mx-2">{{ $difficulty->grade_numerical }}</p>
                            <i class="fa-regular fa-face-grimace"></i>
                        </div>
                        @elseif ($difficulty->grade_numerical > 4)
                        <div class="border rounded bg-danger text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                            <p class="mb-0">{{ $difficulty->grade_name }}</p>
                            <p class="mb-0 mx-2">{{ $difficulty->grade_numerical }}</p>
                            <i class="fa-solid fa-face-dizzy"></i>
                        </div>
                        @endif

                        <div>
                            <a href="{{ route('difficulties.show', $difficulty->id) }}">
                                <button class="btn btn-success">Show</button>
                            </a>

                            @auth
                            <a href="{{ route('difficulties.edit', $difficulty->id) }}">
                                <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                            </a>

                            <a href="{{ route('difficulties.sureOfDestroy', $difficulty->id) }}">
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection