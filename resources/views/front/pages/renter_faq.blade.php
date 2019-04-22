@extends('front/layouts.default')
@section('content')
<div class="site-content">



 <section class="faq-sect">

   <div class="container">

      <h3>Renter FAQ</h3>

      <div id="faq" role="tablist" aria-multiselectable="true">



      <div class="card">

      <div class="card-header" role="tab" id="questionOne">

      <h5 class="card-title">

      <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">

      What type of spaces can I find on Pryme Space?

      </a>

      </h5>

      </div>

      <div id="answerOne" class="collapse show" role="tabcard" aria-labelledby="questionOne">

      <div class="card-body">

        <p>You can find <strong>Parking</strong>, <strong>Land</strong>, <strong>Industrial</strong>, <strong>Storage</strong>, <strong>Office</strong> and <strong>Event</strong> spaces.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionTwo">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">

        How can I update my booking?

      </a>

      </h5>

      </div>

      <div id="answerTwo" class="collapse" role="tabcard" aria-labelledby="questionTwo">

      <div class="card-body">

        <p>Update a booking by navigating to your <strong>reservations</strong>. Click the appropriate listing. </p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionThree">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">

        How can I cancel my confirmed booking?

      </a>

      </h5>

      </div>

      <div id="answerThree" class="collapse in" role="tabcard" aria-labelledby="questionThree">

      <div class="card-body">

          <p>To cancel a booking, navigate to your <strong>reservations</strong>. Click the appropriate listing and select cancel. Refund will be disbursed based on the host’s <strong>cancellation policy</strong>.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionFour">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerFour" aria-expanded="true" aria-controls="answerFour">

          Can I book multiple categories of space?

      </a>

      </h5>

      </div>

      <div id="answerFour" class="collapse in" role="tabcard" aria-labelledby="questionFour">

      <div class="card-body">

          <p>Of course. <a href="#" data-toggle="modal"  data-target="#singupModal">here</a> are the types of spaces that are available.</p>

      </div>

      </div>

      </div>



      </div>

  </div>

 </section>



</div><!-- site-content -->
@stop

