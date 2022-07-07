@component('mail::message')
# {{ getSalution() }},

### Votre reservation n'a pas été validé par {{ $type == 'TRAVEL' ? "le voyageur" : "l'expediteur" }}.

@component('mail::button', ['url' => url(route('welcome')), 'color' => 'success'])
   Cliquer ici pour retourner sur Colissend
@endcomponent

Merci<br>
{{ config('app.name') }}
@endcomponent
