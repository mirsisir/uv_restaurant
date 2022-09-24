@component('mail::message')
# Confirmation

You Table Reservation Has Confirm.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
If you need to get in touch, you can email or phone us directly. We look forward to welcoming you soon!

Thanks again,
{{ config('app.name') }}
@endcomponent
