@component('mail::message')

Dear,

It seems like you have forgot your password. Click the link below and you'll be redirected to a secure site from which you can set a new password.

@component('mail::button', ['url' => URL::to('/').'/getForgotpass?passwordtoken='.$token_data['access_token']])
Button Text
@endcomponent

If you did not forgot your password you can safely ignore this email.

Stay connected with us!

We wish you a great experience!

Cheers,

{{ config('app.name') }} Team.
@endcomponent
