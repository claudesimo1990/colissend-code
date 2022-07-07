@component('mail::message')
# {{ $contact['subject'] }}

## Bonjour , cette utilisateur veut vous contacter :

### Name:  {{  $contact['name'] }}
### Email:  {{  $contact['email'] }}

### message: <br>
{{ $contact['message'] }}

Merci,<br>
{{ config('app.name') }}
@endcomponent
