@component('mail::message')

@php($total = 0)

# {{ getSalution() }}, vous avez une nouvelle reservation.

Une resevation de {{ $kilos }} kilos à été faite, Sur votre post de {{ $p->from }} pour {{ $p->to }} du {{ formatDate($p->dateFrom) }} au {{ formatDate($p->dateTo) }}.
<br><br>

## Details de la reservation:
@component('mail::table')
    | Element       | Quantité       |  Prix unitaire |  Total en Euro |
    | :--------- | :------------- | :------------- | :------------- |
    @foreach ($r as $key => $value)
        | {{ $value['name'] }} | {{ $value['number'] }} | {{ $value['price'] }} | {{ $value['number'] * $value['price'] }} |
    @endforeach
@endcomponent

@component('mail::panel')
    # Infos sur le destinataire:
@component('mail::table')
    | Nom       | N°CNI         | Telephone  | Lieux de rencontre  |
    | ------------- |:-------------:| --------:|:-------------:|
    | {{ $recipient->name }}      | {{ $recipient->cni }}      | {{ $recipient->phone }}      | {{ $recipient->place }}|
@endcomponent

# Message:
{{ $message }}
@endcomponent

<span style="display: inline;">
    @component('mail::button', ['url' => route('booking-validate', ['reservation' => $id]), 'color' => 'green'])
           Valider la reservation
    @endcomponent
    @component('mail::button', ['url' => route('booking-except', ['reservation' => $id]), 'color' => 'red'])
            Refuser la reservation
    @endcomponent
</span>

<br><br>

Merci<br>
{{ config('app.name') }}
@endcomponent