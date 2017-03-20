@extends('layouts.master')

@section('page-header', 'Registraties')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Aantal registraties: {{ $registrations->count() }}</h3>
        </div>
        <div class="box-body">
            @if (!$registrations->isEmpty())
                <table class="table">
                    <colgroup>
                        <col>
                        <col width="150">
                        <col width="200">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Gebruiker</th>
                            <th>Status</th>
                            <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td><a href="{{ route('admin.registrations.show', $registration) }}">{{ $registration->username }}</a></td>
                                <td>
                                    @php
                                        $statusClass = 'default';
                                        switch ($registration->status) {
                                            case 'new': $statusClass = 'primary'; break;
                                            case 'accepted': $statusClass = 'success'; break;
                                            case 'rejected': $statusClass = 'danger'; break;
                                        }
                                    @endphp
                                    <span class="label label-{{ $statusClass }}">{{ __('registration.status.' . $registration->status) }}</span>
                                </td>
                                <td>
                                    <abbr title="{{ $registration->created_at }}">{{ $registration->created_at->diffForHumans() }}</abbr>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Geen registraties</p>
            @endif
        </div>
    </div>
@endsection
