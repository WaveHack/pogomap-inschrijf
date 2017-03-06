@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Inschrijven</h1>
        <p class="lead">Voor de Pokémon Go map van Groningen</p>
    </div>

    <form class="form-horizontal" action="{{ route('register') }}" method="post" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">In-game naam <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="username" class="form-control" id="username" placeholder="In-game naam" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                <p class="help-block">Na goedkeuring krijg je op dit adres een email met je wachtwoord. Dit kan enige tijd duren aangezien dit handmatig gebeurt. Ook als je je wachtwoord vergeten bent kun je hiermee een nieuw wachtwoord aanvragen.</p>
                <p class="help-block">Je in-game naam en email zijn NIET zichtbaar voor andere gebruikers, anders dan voor de beheerders van de Pokémon Go map van Groningen ter controle. Je email-adres wordt ook niet verstrekt aan derden of voor promotiedoeleinden gebruikt.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="buddy_name" class="col-sm-3 control-label">Verificatie <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                Stap 1: Geef je buddy de naam <em>{{ $buddy_name }}</em><br>
                Stap 2: Maak een screenshot van je character, zorg dat je naam, je buddy naam en 'start date' duidelijk zichtbaar zijn en voeg dit bestand toe:<br><br>
                <input type="file" name="buddy_name" class="custom-file-input" id="buddy_name" required><br>
                Voorbeeld;<br>
                <img src="{{ asset('assets/app/images/registration_example.png') }}" alt="Voorbeeld" class="img-responsive img-thumbnail">
            </div>
        </div>

        <div class="form-group">
            <label for="terms" class="col-sm-3 control-label">Voorwaarden <span class="text-danger">*</span></label>
            <div class="col-sm-9">
                <p>Door je in te schrijven verklaar je akkoord te gaan met de volgende voorwaarden:</p>
                <ul>
                    <li>Na goedkeuring zul je je accountgegevens niet delen. Hier wordt geanonimiseerd op gecontroleerd door de beheerders en bij constatering van misbruik wordt het account gedeactiveerd.</li>
                </ul>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" id="terms"> Yes, ik ga hier mee akkoord. Geef me toegang tot de awesome map!
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
