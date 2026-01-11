@extends('layouts.app')

@section('content')

    @auth
        <div class="p-5 mx-auto my-5">

            <h1>Are you sure you want to delete {{ $difficulty->grade_name }} ({{ $difficulty->grade_numerical }})?</h1>                

            <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
                <a href="{{ url('/') }}">
                    <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
                </a>

                <form action="{{ route('difficulties.destroy', $difficulty->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" class="btn btn-danger" value="Delete {{ $difficulty->grade_name }}"></input>
                </form>
            </div>
        </div>
    @endauth

    @guest
        <div class="d-flex justify-content-around align-items-center flex-column my-5">
            <h1 class="mb-0" style="font-size: 4rem;">Error 404</h1>
            <h5 class="text-secondary" style="font-size: 1.4rem;">The page does not exist</h5>

            <a href="{{ url('/') }} }}" class="mt-4">
                <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
            </a>
        </div>
    @endguest


@endsection
