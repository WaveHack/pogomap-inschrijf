@extends('layouts.master')

@section('page-header', 'Dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nieuwe registraties</h3>
        </div>
        <div class="box-body">
            @if (!$registrations->isEmpty())
                <table class="table">
                    <colgroup>
                        <col>
                        <col width="200">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Gebruiker</th>
                            <th>Wanneer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td><a href="{{ route('admin.registrations.show', $registration) }}">{{ $registration->username }}</a></td>
                                <td>
                                    <abbr title="{{ $registration->created_at }}">{{ $registration->created_at->diffForHumans() }}</abbr>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Geen nieuwe registraties</p>
            @endif
        </div>
    </div>
@endsection
