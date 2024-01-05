@component('mail::message')
## Dear {{ $user->name ?? ''}}


Dear {{ $user->name ?? '' }},
Thank .
<br>
<br>
Best regards,
<br>
@endcomponent
