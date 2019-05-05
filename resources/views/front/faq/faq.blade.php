@extends('front/layouts.default')
@section('content')


<div class="site-content">



 <section class="faq-sect">
   <div class="container">

      <h3>FAQ</h3>

<ul class="nav nav-tabs">
  @foreach($listFaqCategory as $index => $faqCategory) 
   <li <?php if($index == 0){ echo 'class="active"';} else {echo 'class=""';} ?>>
    <a data-toggle="tab" href="#<?=$faqCategory->category_name?>"><?=$faqCategory->category_name?></a>
   </li>
  @endforeach
  <!-- <li class="active"><a data-toggle="tab" href="#general-faq">General</a></li>
  <li><a data-toggle="tab" href="#host-faq">Host</a></li>
  <li><a data-toggle="tab" href="#renter-faq">Renter</a></li>
  <li><a data-toggle="tab" href="#pricing-faq">Pricing</a></li>
  <li><a data-toggle="tab" href="#payments-faq">Payments</a></li>
  <li><a data-toggle="tab" href="#other-faq">Other</a></li> -->
</ul>

<div class="tab-content">
  
  <div id="general-faq" class="tab-pane fade in active">
    <div id="general" role="tablist" aria-multiselectable="true"> 
      <div class="card">
      <div class="card-header" role="tab" id="questionOne">
      <h5 class="card-title">
      <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">
      What is Pryme Space?
      </a>
      </h5>
      </div>
      <div id="answerOne" class="collapse show" role="tabcard" aria-labelledby="questionOne">
      <div class="card-body">
        <p>We’re the place for your space. We make finding and listing space easy. We don’t just help you park or find a place to stash that old furniture you were planning to sell. Check out our growing selection for <strong>Parking</strong>, <strong>Land</strong>, <strong>Industrial</strong>, <strong>Storage</strong>, <strong>Office</strong> and <strong>Event</strong> spaces. </p>
      </div>
      </div>
      </div>

      <div class="card">
      <div class="card-header" role="tab" id="questionTwo">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
      What is the cancellation and refund policy?
      </a>
      </h5>
      </div>
      <div id="answerTwo" class="collapse" role="tabcard" aria-labelledby="questionTwo">
      <div class="card-body">
        <p>Every space is different. A single cancellation policy does not fit all booking types. Hosts can choose the appropriate policy that works best for their space and business. One of the following cancellation policies chosen by Host will be applied to each listing, except for On-Demand Parking.</p>

        <h6>Flexible</h6>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For a full refund of fees, cancellations must be made a full 24 hours prior to listing’s local check in time (or 3:00 PM if not specified) on the day of check in. For example, if check-in is on Friday, cancel by Thursday of that week before check in time.<br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the renter cancels less than 24 hours before check-in, the first night is non-refundable.<br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the renter arrives and decides to leave early, the accommodation fees for the nights not spent 24 hours after the official cancellation are fully refunded.</p>

        <h6>Medium</h6>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; For a full refund of fees, cancellations must be made five full days prior to listing’s local start time (or 3:00 PM if not specified) on the day of check in. For example, if check-in is on Friday, cancel by the previous Sunday before check in time.<br>

       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the renter cancels less than 5 days in advance, the first night is non-refundable but 50% of the accommodation fees for remaining nights will be refunded.<br>

       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the renter decides to vacate early, 50% of the booking fees for the nights not spent 24 hours after the cancellation occurs are refunded.</p>


       <h6>Strict</h6>

       <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For a full refund of booking fees, cancellations must be made within 48 hours of booking and at least 14 full days prior to listing’s local check-in time (or 3:00 PM if not specified) on the day of check-in.<br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For a 50% refund of booking fees, cancellations must be made 7 full days prior to listing’s local check in time (or 3:00 PM if not specified) on the day of check in, otherwise no refund. For example, if check-in is on Friday, cancel by Friday of the previous week before check in time.<br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the renter cancels less than 7 days in advance or decides to leave early after check-in, the nights not spent are not refunded.</p>


        <h6>On-Demand Parking (booking within 24 hours)</h6>

        <p>Bookings are non-refundable, regardless of your use or non-use of the Booking and regardless of any circumstance surrounding the use or non-use of a Booking (i.e., traffic or weather delays, cancellation of a related event).</p>

        <p><em>*Cancellation and refund policies are subject to change*</em></p>
      </div>
      </div>
      </div>


      <div class="card">
      <div class="card-header" role="tab" id="questionThree">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">
          How do I create an account to list or book a space? 
      </a>
      </h5>
      </div>
      <div id="answerThree" class="collapse in" role="tabcard" aria-labelledby="questionThree">
      <div class="card-body">
          Simply signup <a href="#" data-toggle="modal"  data-target="#singupModal">here</a> as a user or a host.
      </div>
      </div>
      </div>


      <div class="card">
      <div class="card-header" role="tab" id="questionFour">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerFour" aria-expanded="true" aria-controls="answerFour">
          What are the benefits of booking using Pryme Space?
      </a>
      </h5>
      </div>
      <div id="answerFour" class="collapse in" role="tabcard" aria-labelledby="questionFour">
      <div class="card-body">
          <p>There are a lot of cool reasons to use Pryme Space. Here are a few:</p>
          <h6>Make money</h6>
          <ul>
            <li>We turn your space into cash. Having more streams of revenue is always a good thing.</li>
          </ul>

          <h6>All-in-one Platform</h6>
          <ul>
            <li>Pryme Space is an easy to use, all-in-one platform, for hosts to list and earn extra income for their space and for users to find spaces that saves them valuable time and effort.</li>
          </ul>

          <h6>Largest collection of spaces</h6>
          <ul>
            <li>We provide free or low-cost visibility of spaces to users worldwide, and quick and seamless cash flow to hosts by integrating IoT into our platform to create and connect smart cities and regions</li>
          </ul>

          <h6>AI for best matches</h6>
          <ul>
            <li>Our unique set of intelligent AI tools enable users to save time by instantly finding the perfect property. Review systems and other protections on our platform enable both hosts and users the peace of mind to share or use their space.</li>
          </ul>

          <h6>A competitive marketplace</h6>
          <ul>
            <li>Our wide range of spaces ensure the best price and market recommendations for every budget. Our hosts can use our smart pricing features or set their own pricing. Our spaces range so users find exactly what suits their needs and budget.</li>
          </ul>
      </div>
      </div>
      </div>
      </div>
  </div><!-- #general-faq -->
  <div id="host-faq" class="tab-pane fade">
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
  </div><!-- #host-faq -->
  <div id="renter-faq" class="tab-pane fade">
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
  </div><!-- #renter-faq -->
  <div id="pricing-faq" class="tab-pane fade">
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
  </div><!-- #pricing-faq -->
  <div id="payments-faq" class="tab-pane fade">
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
  </div><!-- #payments-faq -->
  <div id="other-faq" class="tab-pane fade">
    <div class="card">
      <div class="card-header" role="tab" id="questionOne">
      <h5 class="card-title">
      <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">
      Does Pryme Space offer insurance coverage?
      </a>
      </h5>
      </div>
      <div id="answerOne" class="collapse show" role="tabcard" aria-labelledby="questionOne">
      <div class="card-body">
        <p>Our insurance program provides primary liability coverage for up to $1,000,000 per occurrence in the event of a third-party claim of bodily injury or property damage related to a booking. This coverage is subject to a $1,000,000 cap per listing location, and certain conditions, limitations, and exclusions may apply.  Insurance will only act as the primary insurance coverage for incidents related to an Pryme Space rental, but it's available to hosts regardless of their other insurance arrangements.</p>
      </div>
      </div>
      </div>

      <div class="card">
      <div class="card-header" role="tab" id="questionTwo">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
        How do parking sensors work?
      </a>
      </h5>
      </div>
      <div id="answerTwo" class="collapse" role="tabcard" aria-labelledby="questionTwo">
      <div class="card-body">
        <p>The sensor integrates with the Pryme Space platform and allows us to determine when, where, and how long someone is parked in your space(s). </p>
      </div>
      </div>
      </div>

      <div class="card">
      <div class="card-header" role="tab" id="questionThree">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="true" aria-controls="answerThree">
        Do I need to install parking sensors myself?
      </a>
      </h5>
      </div>
      <div id="answerThree" class="collapse in" role="tabcard" aria-labelledby="questionThree">
      <div class="card-body">
          <p>No, we will do that for you!</p>
      </div>
      </div>
      </div>

      <div class="card">
      <div class="card-header" role="tab" id="questionFour">
      <h5 class="card-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerFour" aria-expanded="true" aria-controls="answerFour">
          What other services does Pryme Space offer?
      </a>
      </h5>
      </div>
      <div id="answerFour" class="collapse in" role="tabcard" aria-labelledby="questionFour">
      <div class="card-body">
          <p>We offer a-la-carte services that can enhance your listing(s).</p>
          <ul>
            <li>In the near future we are planning to offer virtual tour services for your space.</li>
            <li>We can provide photography services to enhance your listings appeal.</li>
            <li>Paid-premium listing to bring more visibility to your space(s).</li>
            <li>Vendor recommendations </li>
          </ul>

      </div>
      </div>
      </div>
  </div><!-- #other-faq -->
</div>

      

  </div>
 </section>



</div><!-- site-content -->

@stop

