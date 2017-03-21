@extends('layouts.master')

@section('page-header', 'Inloggen')

@section('content')
    <form class="form-horizontal" action="{{ route('auth.login') }}" method="post" role="form">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
            <label for="password" class="col-sm-3 control-label">Wachtwoord <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password" placeholder="Wachtwoord" required>
                @if ($errors->has('password'))
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Onthoud mij
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </div>

    </form>
@endsection
