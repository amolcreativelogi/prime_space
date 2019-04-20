@component('mail::message')
Thank you for choosing Pryme Space for booking the properties.

Your parking [NAME] has been been booked successfully. 

Here are the details of your booking:

Seller Name: [dynamic data]
Parking Name: [dynamic data]
Parking Link: [dynamic data]
Parking Address: [dynamic data]
Booking Date/Time: [dynamic data - from and to]
Booking Price: : [dynamic data - total price]

Car Type: [dynamic data - only selected car type]
Location Type: [dynamic data - only selected location type]
Amenities: [dynamic data - only selected amenities]

@component('mail::button', ['url' => URL::to('/')])
Login
@endcomponent
@endcomponent
