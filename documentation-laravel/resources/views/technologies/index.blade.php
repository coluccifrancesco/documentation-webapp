@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="mt-4 mx-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Technologies list</h2>

            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('technologies.create') }}" class="">
                        <button class="btn btn-success">Create new technology</button>
                    </a>
                @endif
            @endauth
        </div>

        <div class="row mt-3">

            @foreach ($technologies as $tech)
                <div class="col-12 col-md-6 col-xl-4 my-2">
                    <div class="rounded py-2 px-3 d-flex justify-content-between align-items-center" style="background-color: {{ $tech->bg_color }}; color:{{ $tech->font_color }}">

                        <p class="mb-0">{{ $tech->name }}</p>

                        <div>
                            <a href="{{ route('technologies.show', $tech->id) }}">
                                <button class="btn btn-success">Show</button>
                            </a>

                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('technologies.edit', $tech->id) }}">
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                                    </a>

                                    <a href="{{ route('technologies.sureOfDestroy', $tech->id) }}">
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection