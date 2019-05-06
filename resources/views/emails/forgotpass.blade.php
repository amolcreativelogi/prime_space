
@include('emails.email_header')

We have received a password change request for your account with Pryme Story. If you have not requested this, please contact the Pryme Story support team.

Resetting your new password should be easy. Visit the below link to reset/change your password. 

@component('mail::button', ['url' => URL::to('/').'/getForgotpass?passwordtoken='.$token_data['access_token']])
Forgot Password
@endcomponent


@include('emails.email_footer')