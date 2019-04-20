@component('mail::message')
Your password has been changed successfully. If you have not made this password change, please contact the Pryme Space support team immidiately.

@component('mail::button', ['url' => URL::to('/')])
Contact Us
@endcomponent

@endcomponent
