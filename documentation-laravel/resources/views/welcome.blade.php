@extends('layouts.app')

@section('content')

    @auth
        @if (Auth::user()->role === 'admin')
            <h2>Sei l'admin</h2>
        @else
            <h2>Non sei l'admin</h2>
        @endif
    @endauth

    <h2>Lo vedi anche se sei un ospite</h2>

@endsection