@component('mail::message')

# Nouveau message de {{ $m->user->name }},

@component('mail::panel')
    # Message:
    {{ $m->content }}
@endcomponent

@component('mail::button', ['url' => url(route('welcome')), 'color' => 'success'])
    Retourner sur Colissend
@endcomponent

Merci de nous faire confiance!<br>
{{ config('app.name') }}
@endcomponent