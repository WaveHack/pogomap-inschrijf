@component('mail::message')
Beste {{ $registration->username }},

Een beheerder heeft je wachtwoord gereset op de {{ config('app.name') }}.

Link: {{ url(env('MAP_URL')) }}<br>
Gebruikersnaam: {{ $registration->username }}<br>
<b>Nieuwe wachtwoord: {{ $password }}</b>

@component('mail::button', ['url' => env('MAP_URL')])
Ga naar de map
@endcomponent

Veel plezier!

{{ config('app.name') }}
@endcomponent
