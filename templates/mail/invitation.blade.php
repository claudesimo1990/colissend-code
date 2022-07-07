@component('mail::message')

# Invitation

## Bonjour , Votre ami {{ auth()->user()->lastname . ' ' . auth()->user()->firstname }} aimerait vous inviter a faire partir de la communauté Colissend.

@component('mail::button', ['url' => url(route('register'))])
    Cliquer ici pour rejoindre la communauté.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
