@component('mail::message')
Congratulations! Your Profile has been approved by the Admin. 
Now you can access the website Pryme Space and can post your properties to sell or rent.

Please login to post your property.
@component('mail::button', ['url' => URL::to('/')])
Login
@endcomponent

@endcomponent
