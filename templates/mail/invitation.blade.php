@component('mail::message')

# Invitation

## Bonjour , Votre ami {{ auth()->user()->lastname . ' ' . auth()->user()->firstname }} aimerait vous inviter a faire partir de la communaut√© Colissend.

@component('mail::button', ['url' => url(route('register'))])
    Cliquer ici pour rejoindre la communaut√©.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
