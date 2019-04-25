	@extends('front/layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>

<div class="site-content">
<section class="bookingform">
<div class="container">
<h3>Welcome to Prymestory. Book your property</h3>
<!--<h3>booking form</h3>-->
<div class="row">
<div class="col-sm-8">
<div class="selectdate">
<h3><?php echo !isset($getPropertyDetails->name)?'':$getPropertyDetails->name;?></h3>
<h4><?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></h4>
<!--<select class="filter-select">-->
<!-- <option>Car Type</option>-->
<!-- <option>Hatchback </option>-->
<!-- <option>Sedan </option>-->
<!-- <option>MPV </option>-->
<!-- <option>SUV </option>-->
<!-- <option>Crossover </option>-->
<!-- <option>Coupe </option>-->
<!-- <option>Convertibl </option>-->
<!--</select>-->
<label>Car Type : <strong><?php echo $getCarProperty->car_type;?></strong></label><br>
<label>Location Type : <strong>Covered</strong></label>
<!--<select class="filter-select">-->
<!-- <option>Location Type</option>-->
<!-- <option>Covered </option>-->
<!-- <option>Uncovered </option>-->
<!-- <option>Both </option>-->
<!--</select>-->
<div class="row">
<div class="col-sm-6">
<div class="form-group date-group">
<label>From</label>
<div class="date"><?php echo $fromdate; ?></div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group date-group">
<label>To</label>
<div class="date"><?php echo $todate;?></div>
</div>
</div>
</div>
</div>
<hr>
<?php if(isset($_SESSION['user']['is_user_login'])) { ?>
<div class="your-info">
<h3>Your Information</h3>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>FIRST NAME <span>*</span></label>
<input type="text" class="form-control" placeholder="FIRST NAME" value="<?php echo $user_details_get->firstname; ?>">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>LAST NAME <span>*</span></label>
<input type="text" class="form-control" placeholder="LAST NAME" value="<?php echo $user_details_get->lastname; ?>">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>EMAIL <span>*</span></label>
<input type="text" class="form-control" placeholder="name@email.com" value="<?php echo $user_details_get->email_id; ?>" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>PHONE NUMBER</label>
<input type="text" class="form-control" placeholder="() -___" value="<?php echo $user_details_get->contact_no; ?>">
</div>
</div>
</div>
</div>
<hr>


<div class="row">
    <div class="col-md-9 col-md-offset-2">
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table" >
                <div class="row display-tr" >
                    <h3 class="panel-title display-td" >Payment Details</h3>
                    <div class="display-td" >                            
                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                    </div>
                </div>                    
            </div>
            <div class="panel-body">
                <form role="form" action="{{ route('make_payment.post') }}" method="post" class="require-validation"
                                                 data-cc-on-file="false"
                                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                id="payment-form">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="hidden" name="finalprice" value="<?php echo $finalprice;?>">
                    <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label> <input
                                class='form-control' size='4' type='text' name="name">
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Card Number</label> <input
                                autocomplete='off' class='form-control card-number' size='20'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input autocomplete='off'


                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                        </div>
                    </div>
                      
                </form>
            </div>
        </div>        
    </div>
</div>






<!-- <div class="paymentbox">
	<div id="dropin-container"></div>
	<button id="submit-button">Request payment method</button>
</div> -->
<!-- <div class="your-info" style="display:none;">
<h3>Payment Method</h3>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>YOUR CARD NUMBER <span>*</span></label>
<input type="text" class="form-control" placeholder="Your Card Number" >
</div>
</div>
<div class="col-sm-12">
<div class="row">
<div class="col-sm-8">
<div class="form-group cardexp-group">
<label>EXPIRATION DATE (MM/YYYY)</label>
<input type="text" class="form-control" placeholder="Month" > /
<input type="text" class="form-control" placeholder="Year" >
</div>

</div>
<div class="col-sm-4">
<div class="form-group">
<label>CVV</label>
<input type="text" class="form-control" placeholder="CVV" > 
</div>
</div>
</div>

</div>
<div class="col-sm-6">
<div class="form-group">
<label>POSTAL CODE <span>*</span></label>
<input type="text" class="form-control" placeholder="Postal code" >
</div>
</div>
<div class="col-sm-6"></div>
<div class="col-sm-6">
<div class="form-group">
<input type="checkbox" name="">Save payment method
</div>
</div>
<div class="col-sm-6"></div>
<hr>
<div class="col-sm-6"><h4>Your Order Total</h4></div>
<div class="col-sm-6"><h2>$<?php echo $finalprice;?></h2></div>
<div class="col-sm-6"><input type="button" value="submit" onclick="searchURL()" data-toggle="modal" data-target="#thanksModal"></div>
</div>
</div> -->
<?php } else {?>
<a href="#" data-toggle="modal" class="book-signup" data-target="#loginModal">Please sign-in to book your property</a>
<?php }?>
</div>
<div class="col-sm-4">
<div class="total-order">ORDER TOTAL <span>$<?php echo $finalprice;?></span></div>
<div class="book-box">
<div class="book-add"><?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></div>
<div class="book-img"><img src="<?php echo url('/public/images/properties/'.$getPropImages->name)?>" alt=""></div>
<div class="book-amenties">
<ul>
<?php foreach($getPropAmenities as $amenities) {
if (isset($amenities->amenity_image) && file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
$image = '<img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="100">';
} else {
$image = 'No Image';
}
?>
<li><?php echo $image; ?><span><?php echo $amenities->amenity_name; ?> </span></li> 
<?php } ?>
</ul>
</div>
</div>
</div>
<!-- <div class="col-md-8 col-md-offset-2" style="top:-120px;">
<div id="dropin-container"></div>
<button id="submit-button">Request payment method</button>
</div> -->
</div>
</div>
</section>

<!-- thanksModal start -->
<div class="modal fade formModal" id="thanksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<!--<h5 class="modal-title" id="exampleModalLabel">Find a space</h5>-->
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
          <div class="thanksmsgbox">
                <i class="fa fa-smile-o" aria-hidden="true"></i>
                <h2>Thanks for your Booking</h2>
          </div> 
</div>
</div>
</div>
</div>
<!-- thanksModal end -->

</div>



</div>

@stop

@section('script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection