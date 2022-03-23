@component('mail::message')

# Salut,

### Sur votre post de {{ $p->from }} pour {{ $p->to }} du {{ formatDate($p->dateFrom) }} au {{ formatDate($p->dateTo) }}

#### Je me propose de transporter :

@foreach(json_decode($r->objects) as $obj)
- {{ $obj->name }}
@endforeach

*Poids estimé à* :  **{{ $r->kilo }}kg**.

*Prix estimé à* :  **{{ $r->price }}&euro;**.

Message:
{{ $r->message }}


@component('mail::button', ['url' => url(route('user.profile.show', ['profile' => $notifiable->id])), 'color' => 'success'])
    Retourner sur votre profile pour valider ou refuser la reservation
@endcomponent

Merci de nous faire confiance!<br>
{{ config('app.name') }}
@endcomponent
