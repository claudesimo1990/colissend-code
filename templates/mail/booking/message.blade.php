@component('mail::message')

    # Nouveau message de {{ $m->user->name }},

### Message: {{ $m->content }}

Merci de nous faire confiance!
</br>
{{ config('app.name') }}
@endcomponent