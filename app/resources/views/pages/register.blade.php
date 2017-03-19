@extends('layouts.topnav')

@section('page-header', 'Inschrijven')
@section('page-subheader', config('app.name'))

@section('content')
    <form class="form-horizontal" action="{{ route('register') }}" method="post" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('username') ? 'has-error' : null }}">
            <label for="username" class="col-sm-3 control-label">In-game naam <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="username" class="form-control" id="username" placeholder="In-game naam" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <p class="help-block">{{ $errors->first('username') }}</p>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
            <label for="email" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <p>Na goedkeuring krijg je op dit adres een email met je wachtwoord. Dit kan enige tijd duren aangezien dit handmatig gebeurt. Als je een van de beheerders kent dan kun je hen ook vragen om je registratie te beoordelen als je haast hebt.</p>
                {{--<p>Als je je wachtwoord vergeten bent kun je <a href="#">een nieuw wachtwoord aanvragen</a>.</p>--}}
                <p>Je in-game naam en email zijn NIET zichtbaar voor andere gebruikers, anders dan voor de beheerders van de {{ config('app.name') }} ter controle. Je email-adres wordt ook NIET aan derden verstrekt en wordt NIET voor promotiedoeleinden gebruikt.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="buddy_file" class="col-sm-3 control-label">Verificatie <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                Stap 1: Geef je buddy de naam <mark style="font-family: monospace;">{{ $buddy_name }}</mark><br>
                Stap 2: Maak een screenshot van je character<br>
                Stap 3: Zorg dat je in-game naam, je buddy naam, je level, experience en start date duidelijk zichtbaar zijn<br>
                Stap 4: Voeg dit bestand hier toe in de originele resolutie:<br><br>
                <input type="file" name="buddy_file" class="custom-file-input" id="buddy_name" required><br>
                Voorbeeld (lage resolutie):<br>
                <img src="{{ asset('assets/app/images/registration_example.png') }}" alt="Voorbeeld" class="img-responsive img-thumbnail">
            </div>
        </div>

        <div class="form-group">
            <label for="terms" class="col-sm-3 control-label">Voorwaarden <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <p>Door je in te schrijven verklaar je akkoord te gaan met de volgende voorwaarden:</p>
                <ul>
                    <li>Je zal je accountgegevens niet delen met anderen om hen toegang tot de {{ config('app.name') }} te geven met jouw account. Bij constatering van misbruik wordt een waarschuwing gegeven of wordt het account gedeactiveerd.</li>
                    <li>De map is afhankelijk van externe partijen en factoren en bij uitval van de map wordt er naar redelijkheid hard gewerkt om de map z.s.m. weer draaiende te krijgen. Vaak is dit wachten op een update van de externe partijen en hebben de beheerders hier geen invloed op.</li>
                    <li>De {{ config('app.name') }} is een gratis dienst en er kunnen geen rechten aan worden ontleend.</li>
                </ul>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" id="terms" required> Yes, ik ga hiermee akkoord!
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Inschrijven</button>
            </div>
        </div>
    </form>
@endsection
