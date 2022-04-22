@component('mail::message')
# {{ getSalution() }} {{ $notifiable->name }},
##  Vous avez une nouvelle reservation.

Une resevation de <strong>{{ $kilos }} kilos</strong> à été faite, Sur votre post de <strong>{{ $p->from }}</strong> pour <strong>{{ $p->to }}</strong> du <strong>{{ formatDate($p->dateFrom) }}</strong> au <strong>{{ formatDate($p->dateTo) }}</strong>.
<br><br>

# Details de la reservation:
@component('mail::table')
    | Element       | Quantité       |  Prix unitaire |  Total en Euro |
    | :--------- | :------------- | :------------- | :------------- |
    @foreach ($r as $key => $value)
        | <span>{{ $key == 'total' ? 'Somme à payer :' : $value['name'] }}</span> | <span @if($key == 'total')style="display: none"@endif>{{ $value['number'] }}</span> | <span @if($key == 'total')style="display: none"@endif>{{ $value['price'] }} |</span> <span class="{{ $key }}">{{ $value['number'] * $value['price'] }}</span> |
    @endforeach
@endcomponent

# Info sur le destinataire
@component('mail::panel')
    <div style="display: flex; flex-direction: column; justify-content: start;">
        <span style="display: flex; justify-content: space-between; align-items: center"><strong>Nom:</strong>  <span>{{ $recipient->name }}</span></span>
        <span style="display: flex;  justify-content: space-between; align-items: center"><strong>N° CNI :</strong>  <span>{{ $recipient->cni }}</span></span>
        <span style="display: flex;  justify-content: space-between; align-items: center"><strong>Telephone:</strong>  <span>{{ $recipient->phone }}</span></span>
        <span style="display: flex;  justify-content: space-between; align-items: center"><strong>Lieux de rencontre:</strong>  <span>{{ $recipient->place }}</span></span>
    </div>
@endcomponent

<span style="display: inline;">
@component('mail::button', ['url' => route('booking-validate', ['reservation' => $id]), 'color' => 'green'])
    Valider la reservation
@endcomponent
</span>
<span style="display: inline;">
@component('mail::button', ['url' => route('booking-except', ['reservation' => $id]), 'color' => 'red'])
    Refuser la reservation
@endcomponent
</span>
<br><br>

Merci, de nous faire confiance<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
