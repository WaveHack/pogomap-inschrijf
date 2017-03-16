@component('mail::message')
Beste {{ $registration->username }},

Je registratie voor de {{ config('app.name') }} is goedgekeurd!

Je kan bij de map met de volgende gegevens:

Link: {{ url(env('MAP_URL')) }}<br>
Gebruikersnaam: {{ $registration->username }}<br>
Wachtwoord: {{ $password }}

@component('mail::button', ['url' => env('MAP_URL')])
Ga naar de map
@endcomponent

Veel plezier!

{{ config('app.name') }}
@endcomponent
