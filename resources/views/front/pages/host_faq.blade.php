@extends('front/layouts.default')
@section('content')

<div class="site-content">



 <section class="faq-sect">

   <div class="container">

      <h3>Host FAQ</h3>

      <div id="faq" role="tablist" aria-multiselectable="true">



      <div class="card">

      <div class="card-header" role="tab" id="questionOne">

      <h5 class="card-title">

      <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">

      What happens if I don’t accept a booking request?

      </a>

      </h5>

      </div>

      <div id="answerOne" class="collapse show" role="tabcard" aria-labelledby="questionOne">

      <div class="card-body">

        <p>You can decline a booking request, but should do so within 24 hours. The amount of time it takes you to respond is factored into your response rate. We track your response rate to ensure reliability of our platform and community.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionTwo">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">

        Can I list multiple categories of spaces?

      </a>

      </h5>

      </div>

      <div id="answerTwo" class="collapse" role="tabcard" aria-labelledby="questionTwo">

      <div class="card-body">

        <p>Absolutely! You can list as many as you want.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionThree">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">

        Can I rent out my driveway?

      </a>

      </h5>

      </div>

      <div id="answerThree" class="collapse in" role="tabcard" aria-labelledby="questionThree">

      <div class="card-body">

          <p>Yes! Start today by clicking <a href="#" data-toggle="modal"  data-target="#singupModal">here</a>.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionFour">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerFour" aria-expanded="true" aria-controls="answerFour">

          When will I get paid?

      </a>

      </h5>

      </div>

      <div id="answerFour" class="collapse in" role="tabcard" aria-labelledby="questionFour">

      <div class="card-body">

          <p>Host payouts will be deposited into the bank account they have on file with us via ACH transfer (direct deposit) and are processed within 7 days of the start of the reservation.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionFive">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerFive" aria-expanded="true" aria-controls="answerFive">

          Does Pryme Space provide any tax information like a Form 1099-K?

      </a>

      </h5>

      </div>

      <div id="answerFive" class="collapse in" role="tabcard" aria-labelledby="questionFive">

      <div class="card-body">

          <p>The US Internal Revenue Service (IRS) requires US companies that process payments, including Pryme Space, to report gross earnings for all US users who earn over $20,000 and have 200+ transactions in the calendar year. If you exceed both IRS thresholds in a calendar year, Pryme Space will issue you a Form 1099-K. If Pryme Space withholds income tax from your earnings, they will also send a form indicating how much was withheld.</p>

      </div>

      </div>

      </div>



      </div>

  </div>

 </section>



</div><!-- site-content -->




@stop

