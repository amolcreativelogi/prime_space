@extends('front/layouts.default')
@section('content')



<div class="site-content">



 <section class="faq-sect">

   <div class="container">

      <h3>Pricing FAQ</h3>

      <div id="faq" role="tablist" aria-multiselectable="true">



      <div class="card">

      <div class="card-header" role="tab" id="questionOne">

      <h5 class="card-title">

      <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">

      What types of payments does Pryme Space allow?

      </a>

      </h5>

      </div>

      <div id="answerOne" class="collapse show" role="tabcard" aria-labelledby="questionOne">

      <div class="card-body">

        <p>Payments can be made via all major credit cards, PayPal, Venmo, ApplePay, and GooglePay. </p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionTwo">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">

        How much fees does Pryme Space charge for booking?

      </a>

      </h5>

      </div>

      <div id="answerTwo" class="collapse" role="tabcard" aria-labelledby="questionTwo">

      <div class="card-body">

        <p>For on demand parking, Pryme Space charges a 10-15% service fee and a $0.99 fee per transaction.</p>

        <p>For all other spaces, Pryme Space charges a 10-20% service fee on all reservations.</p>

      </div>

      </div>

      </div>



      <div class="card">

      <div class="card-header" role="tab" id="questionThree">

      <h5 class="card-title">

      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">

        When will I be charged for booking?

      </a>

      </h5>

      </div>

      <div id="answerThree" class="collapse in" role="tabcard" aria-labelledby="questionThree">

      <div class="card-body">

          <p>For on-demand parking, your payment will be on hold until you arrive at your parking space. Once you confirm your parking space, you’ll be charged for the entire amount of your reservation. If you run over your time some spaces may charge a premium for additional time, unless you extend your reservation before your expiration.</p>

          <p>For all other spaces, your payment will be charged in full as soon as the booking request has been accepted by the host. At that point, the Pryme Space <strong>cancellation policy</strong> takes effect. </p>

      </div>

      </div>

      </div>



      </div>

  </div>

 </section>



</div><!-- site-content -->


@stop

