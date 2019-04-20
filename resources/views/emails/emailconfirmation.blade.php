@component('mail::message')
Thank you for registering with Pryme Space. We request you to please click on the below link or copy paste in your browser to verify your email address.

@component('mail::button', ['url' => URL::to('/')])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
