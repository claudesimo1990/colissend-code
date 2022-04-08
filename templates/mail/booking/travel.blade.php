@component('mail::message')

# {{ getSalution() }},

# Reservation de {{ $r->kilo }} Kilos,

### Vous avez une nouvelle resevation Sur votre post de {{ $p->from }} pour {{ $p->to }} du {{ formatDate($p->dateFrom) }} au {{ formatDate($p->dateTo) }}

#### Objects à transporter :
@foreach(json_decode($r->objects) as $obj)
    - {{ $obj }}
@endforeach

Message de l'acheteur:

{{ $r->message }}

<span style="display: inline;">
    @component('mail::button', ['url' => route('booking-validate', ['reservation' => $r->id]), 'color' => 'green'])
           Valider la reservation
    @endcomponent
    @component('mail::button', ['url' => route('booking-except', ['reservation' => $r->id]), 'color' => 'red'])
            Refuser la reservation
    @endcomponent
</span>

<br><br>

Merci<br>
{{ config('app.name') }}
@endcomponent