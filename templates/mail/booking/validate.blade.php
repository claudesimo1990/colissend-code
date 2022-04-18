@component('mail::message')

# {{ getSalution() }},

## Votre reservation a été validé par {{ $type == 'TRAVEL' ? "le voyageur" : "l'expediteur" }}. Vous pouvez maintenant proceder au payement.

@component('mail::table')
    | Element       | Quantité       |  Prix unitaire |  Total en Euro |
    | :--------- | :------------- | :------------- | :------------- |
    @foreach ($r as $key => $value)
        | {{ $value['name'] }} | {{ $value['number'] }} | {{ $value['price'] }} | {{ $value['number'] * $value['price'] }} |
    @endforeach
@endcomponent

<span style="display: inline;">
    @component('mail::button', ['url' => route('booking-validate', ['reservation' => $id]), 'color' => 'green'])
        Proceder au payment
    @endcomponent
    @component('mail::button', ['url' => route('booking-except', ['reservation' => $id]), 'color' => 'red'])
        Annuler la réservation
    @endcomponent
</span>

<br><br>

Merci<br>
{{ config('app.name') }}
@endcomponent
