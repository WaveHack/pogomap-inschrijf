@extends('layouts.master')

@section('page-header', ('Registratie van ' . $registration->username))

@section('content')
    <div class="row">
        <div class="col-sm-6">

            <div class="row form-group">
                <div class="col-sm-6"><strong>In-game naam:</strong></div>
                <div class="col-sm-6">{{ $registration->username }}</div>
            </div>

            <div class="row form-group">
                <div class="col-sm-6"><strong>Email:</strong></div>
                <div class="col-sm-6"><a href="mailto:{{ $registration->email }}">{{ $registration->email }}</a></div>
            </div>

            <div class="row form-group">
                <div class="col-sm-6"><strong>Buddy naam:</strong></div>
                <div class="col-sm-6"><mark style="font-family: monospace;">{{ $registration->buddy_name}}</mark></div>
            </div>

            <div class="row form-group">
                <div class="col-sm-6"><strong>Status</strong></div>
                <div class="col-sm-6">Nog niet gekeurd</div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <form action="{{ route('admin.registrations.update', $registration) }}" method="post" role="form">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Goedkeuren</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <form action="{{ route('admin.registrations.update', $registration) }}" method="post" role="form">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}

                        <br>
                        <p>Of met reden:</p>
                        <select name="reject_reason" class="form-control" required>
                            <option value=""></option>
                            <option value="no_reason">Geen reden</option>
                            <option value="wrong_buddy_name">Verkeerde buddy naam</option>
                            <option value="spam">Spam (verbergt registratie)</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove-sign"></i> Afkeuren</button><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="data:image/png;base64,{{ $buddyImageData }}" class="img-responsive img-thumbnail" alt="Buddy">
        </div>
    </div>
@endsection
