@component('mail::message')

# {{ getSalution() }},

### Sur votre post de {{ $p->from }} pour {{ $p->to }} du {{ formatDate($p->dateFrom) }} au {{ formatDate($p->dateTo) }}

#### Je me propose de transporter :

@component('mail::table')
    | Name      | Quantité  |
    | :--------- | :------------- |
    @foreach (json_decode($r->objects) as $obj)
    | {{ $obj->name }} | 1 |
    @endforeach
@endcomponent

# Extimation de Prix:

@component('mail::table')
    | Name      | Quantité  |
    | :--------- | :------------- |
    | Poids estimé à | {{ $r->kilo }}kg |
    | Prix estimé à | {{ $r->price }}&euro; |
@endcomponent

Message:
{{ $r->message }}

<br><br>

<span style="display: inline;">
    @component('mail::button', ['url' => route('booking-validate', ['reservation' => $r->id]), 'color' => 'green'])
        Valider la reservation
    @endcomponent
    @component('mail::button', ['url' => route('booking-except', ['reservation' => $r->id]), 'color' => 'red'])
        Refuser la reservation
    @endcomponent
</span>

<br><br>

Merci,<br>
{{ config('app.name') }}
@endcomponent
