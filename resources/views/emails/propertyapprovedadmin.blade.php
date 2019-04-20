@component('mail::message')
Congratulations! Your Property has been approved by the Admin. 
Now buyers can access your property on the website Pryme Space and can book the same.

Here is the link to visit your Property
@component('mail::button', ['url' => URL::to('/')])
Property Link
@endcomponent
@endcomponent
