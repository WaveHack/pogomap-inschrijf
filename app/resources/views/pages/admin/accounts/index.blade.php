@extends('layouts.master')

@section('page-header', 'Gebruikers')

@section('content')
    @if (!$accounts->isEmpty())
        <table class="table">
            <colgroup>
                <col>
                <col width="150">
                <col width="200">
            </colgroup>
            <thead>
                <tr>
                    <th>Gebruiker</th>
                    <th>IPs</th>
                    <th>Laatst actief</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td><a href="{{ route('admin.accounts.show', $account) }}">{{ $account->registration->username }}</a></td>
                        <td>todo</td>
                        <td>
                            @if ($account->last_online)
                                <abbr title="{{ $account->last_online }}">{{ $account->last_online->diffForHumans() }}</abbr>
                            @else
                                <em>N/A</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Geen gebruikers</p>
    @endif
@endsection
