@extends('layouts.app')
@section('content')

    @auth
        @if (Auth::user()->role === 'admin')

            <div class="p-5 mx-auto my-5">

                <h1>Are you sure you want to delete <span class="text-danger">{{ $argument->name }}</span>?</h1>                

                <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
                    <a href="{{ url('/') }}">
                        <button class="btn btn-primary">Home Page <i class="fa-regular fa-house"></i></button>
                    </a>

                    <form action="{{ route('arguments.destroy', $argument->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="submit" class="btn btn-danger" value="Delete {{ $argument->name }}"></input>
                    </form>
                </div>
            </div>
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