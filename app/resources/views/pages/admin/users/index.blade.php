@extends('layouts.master')

@section('page-header', 'Admins')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Aantal admins: {{ $users->count() }}</h3>
        </div>
        <div class="box-body">
            @if (!$users->isEmpty())
                <table class="table">
                    <colgroup>
                        <col>
                        <col width="200">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Geen admins. Huh dit kan helemaal niet?!</p>
            @endif
        </div>
    </div>
@endsection
