@component('mail::message')
Dear {{ $order->shipping->ship_name }},

{{ $message }}

@component('mail::button', ['url' => ''])
Almas
@endcomponent

Sincerely,<br>
{{ config('app.name') }}
@endcomponent
