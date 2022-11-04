@component('mail::message')
Nuovo contatto da: {{ config('app.name') }}

Nome: {{ $lead->name }}<br>
Email: {{ $lead->email }}<br>
<br>
Message: <br>
{{ $lead->message }}
<br>
Grazie
<br>
    
@endcomponent