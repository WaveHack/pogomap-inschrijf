@extends('layouts.master')

@section('page-header', ('Gebruiker ' . $account->registration->username))

@section('content')
    <div class="row">
        <div class="col-sm-6">

            <div class="box">
                <div class="box-header with-title">
                    <h3 class="box-title">Algemene Informatie</h3>
                </div>
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-sm-6"><strong>In-game naam:</strong></div>
                        <div class="col-sm-6">{{ $account->registration->username }}</div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-6"><strong>Email:</strong></div>
                        <div class="col-sm-6"><a href="mailto:{{ $account->registration->email }}">{{ $account->registration->email }}</a></div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-6"><strong>Registratie:</strong></div>
                        <div class="col-sm-6"><a href="{{ route('admin.registrations.show', $account->registration) }}">{{ $account->registration->username }}</a></div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Acties</h3>
                </div>
                <div class="box-body">

                    <form action="{{ route('admin.accounts.reset-password', $account) }}" method="post" role="form">
                        <input type="hidden" name="_method" value="POST">
                        {{ csrf_field() }}

                        <button type="submit" name="reset-password" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> Reset Wachtwoord</button>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-sm-6">

            {{-- todo --}}

        </div>
    </div>
@endsection
