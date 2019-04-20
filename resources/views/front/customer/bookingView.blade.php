@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout bookingview">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 dl-content">
        <h2 class="dash-title">Booking View</h2>
        <div class="container">
          <div class="viewbooking">
            <div class="row">
              <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="viewbookingImg">
                  <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-12">
                  <div class="viewbookingText">
                    <h3>Property name</h3>
                    <h5><strong>Booking Date/Time :-</strong> 20.04.19 15:10</h5>
                    <div class="bookingstatus"><strong>Booking Status :- Booking Running</strong></div>
                    <h5><strong>Message to Host :-</strong> <a href="">Jimmy</a></h5>
                    <button type="button" class="reviewbtn" data-toggle="modal" data-target="#reviewModal">Write a Review</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


<!-- Modal Start -->
<div class="modal reviewModal" id="reviewModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rating & Review</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-field">
          <label>Rating</label>
          <div class="rating">
                <input type="radio" id="star5-5" name="rating" value="5" />
                <label class = "full" for="star5-5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4-5" name="rating" value="4" />
                <label class = "full" for="star4-5" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3-5" name="rating" value="3" />
                <label class = "full" for="star3-5" title="Meh - 3 stars"></label>
                <input type="radio" id="star2-5" name="rating" value="2" />
                <label class = "full" for="star2-5" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1-5" name="rating" value="1" />
                <label class = "full" for="star1-5" title="Sucks big time - 1 star"></label>
            </div>
        </div>
        <div class="form-field">
          <label>Review</label>
          <textarea cols="6" rows="6"></textarea>
        </div>
        <div class="form-field">
          <input type="button" class="blackbtn" value="Submit" name="">
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Modal End -->

</div>
@stop

