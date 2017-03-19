@extends('layouts.topnav')

@section('page-header', ('Welkom bij de ' . config('app.name') . '!'))

@section('content')
    <p>
        <a href="{{ asset('assets/app/images/map_example.png') }}">
            <img src="{{ asset('assets/app/images/map_example.png') }}" class="img img-responsive" alt="Voorbeeld">
        </a>
    </p>

    <p>Voordat je de map kan gebruiken dien je je eerst <a href="{{ route('register') }}">in te schrijven</a>.</p>

    <p>
        <a href="{{ url(env('MAP_URL')) }}" class="btn btn-success btn-lg"><i class="fa fa-map-marker"></i> Naar de map</a>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i> Inschrijven</a>
    </p>
@endsection
