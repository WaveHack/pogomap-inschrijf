@extends('layouts.master')

@section('page-header', 'Dashboard')

@section('content')
    <h4>Nieuwe registraties</h4>
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
@endsection
