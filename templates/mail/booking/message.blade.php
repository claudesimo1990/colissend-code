@component('mail::message')

# Nouveau message de {{ $m->user->name }},

### Message:<br>
{{ $m->content }}


@component('mail::button', ['url' => url(route('welcome')), 'color' => 'success'])
    Retourner sur Colissend
@endcomponent

Merci de nous faire confiance!<br>
{{ config('app.name') }}
@endcomponent