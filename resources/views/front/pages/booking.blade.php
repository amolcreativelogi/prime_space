@extends('front/layouts.default')
@section('content')

<div class="site-content">
    <section class="bookingform">
        <div class="container">
            <h3>booking form</h3>
            <div class="row">
                <div class="col-sm-8">
                    <div class="selectdate">
                        <div class="form-group date-group">
                            <label>From</label>
                             <div class="date"><input type="text" class="form-control" placeholder="Any" id="from" /></div>
                          </div>
                          <div class="form-group date-group">
                            <label>To</label>
                            <div class="date"><input type="text" class="form-control" placeholder="Any" id="to" /></div>
                          </div>
                    </div>
                    <hr>
                    <div class="your-info">
                        <h3>Your Information</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>FIRST NAME <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="FIRST NAME" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>LAST NAME <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="LAST NAME" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>EMAIL <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="name@email.com" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PHONE NUMBER</label>
                                    <input type="text" class="form-control" placeholder="(__) __-___" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="your-info">
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
                            <div class="col-sm-6"><h2>$25.00</h2></div>
<div class="col-sm-6"><input type="button" value="submit" onclick="searchURL()"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total-order">ORDER TOTAL <span>$2500</span></div>
                </div>
            </div>
            
        </div>
    </section>
    
    
    <section class="thanksmsg">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="thanksmsgbox">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>

                        <h2>Thanks for your Booking</h2>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>

</div>
@stop
