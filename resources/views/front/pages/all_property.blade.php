@extends('front/layouts.default')
@section('content')

<div class="site-content">

<div class="all-properties">
    <section class="ap-filter">
      <div class="container">
        <div class="prop-type">
        <select>
          <option>Parking spaces</option>
          <option>Land</option>
        </select>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#monthly">Monthly</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#hourly">Hourly</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="monthly" class="container tab-pane active">
            <form>
              <div class="form-group">
                <label>Region</label>
                <div class="region"><input type="" name="" placeholder="Seattle"></div>
              </div>
              <div class="form-group date-group">
                <label>From</label>
                <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                 <div class="date"><input type="text" class="form-control" placeholder="Any" id="from" /></div>
              </div>
              <div class="form-group date-group">
                <label>To</label>
                <div class="date"><input type="text" class="form-control" placeholder="Any" id="to" /></div>
              </div>
            </form>
          </div>
          <div id="hourly" class="container tab-pane fade">
            <form>
              <div class="form-group">
                <label>Search</label>
                <div class="search"><input type="" name="" placeholder="Address, City"></div>
              </div>
              <div class="form-group date-group">
                <label>From Date</label>
                <div class="date"><input type="" name="" placeholder="Any" id="from_date"></div>
              </div>
               <div class="form-group time-group">
                <label>From time</label>
                <div class="time"><input type="" name="" placeholder="Any" id="from_time"></div>
              </div>
              <div class="form-group date-group">
                <label>To date</label>
                <div class="date"><input type="" name="" placeholder="Any" id="to_date"></div>
              </div>
              <div class="form-group time-group">
                <label>From time</label>
                <div class="time"><input type="" name="" placeholder="Any" id="to_time"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- ap-filter -->

    <section class="filter-result">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 ps-div">
            <div class="ps-count">123 parking spaces</div>
            <div class="ps-box">
                <div class="ps-img">
                  <img src="images/discoverpsace01.jpg" alt="">
                </div>
                <div class="ps-text">
                    <div class="pstext-top">
                      <h3>12th Ave E</h3>
                      <div class="ps-avail">Hourly • Daily • Monthly</div>
                      <div class="ps-price">$83<span>/day</span></div>
                    </div>
                    <div class="pstext-btm">
                      <fieldset>
                      <div class="rating">
                          <input type="radio" id="star5-1" name="rating" value="5" />
                          <label class = "full" for="star5-1" title="Awesome - 5 stars"></label>
                          <input type="radio" id="star4-1" name="rating" value="4" />
                          <label class = "full" for="star4-1" title="Pretty good - 4 stars"></label>
                          <input type="radio" id="star3-1" name="rating" value="3" />
                          <label class = "full" for="star3-1" title="Meh - 3 stars"></label>
                          <input type="radio" id="star2-1" name="rating" value="2" />
                          <label class = "full" for="star2-1" title="Kinda bad - 2 stars"></label>
                          <input type="radio" id="star1-1" name="rating" value="1" />
                          <label class = "full" for="star1-1" title="Sucks big time - 1 star"></label>
                      </div>
                      <span>23</span>
                    </fieldset>
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
            <div class="ps-box">
                <div class="ps-img">
                  <img src="images/discoverpsace01.jpg" alt="">
                </div>
                <div class="ps-text">
                    <div class="pstext-top">
                      <h3>12th Ave E</h3>
                      <div class="ps-avail">Hourly • Daily • Monthly</div>
                      <div class="ps-price">$83<span>/day</span></div>
                    </div>
                    <div class="pstext-btm">
                      <fieldset>
                      <div class="rating">
                          <input type="radio" id="star5-2" name="rating" value="5" />
                          <label class = "full" for="star5-2" title="Awesome - 5 stars"></label>
                          <input type="radio" id="star4-2" name="rating" value="4" />
                          <label class = "full" for="star4-2" title="Pretty good - 4 stars"></label>
                          <input type="radio" id="star3-2" name="rating" value="3" />
                          <label class = "full" for="star3-2" title="Meh - 3 stars"></label>
                          <input type="radio" id="star2-2" name="rating" value="2" />
                          <label class = "full" for="star2-2" title="Kinda bad - 2 stars"></label>
                          <input type="radio" id="star1-2" name="rating" value="1" />
                          <label class = "full" for="star1-2" title="Sucks big time - 1 star"></label>
                      </div>
                      <span>23</span>
                    </fieldset>
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
            <div class="ps-box">
                <div class="ps-img">
                  <img src="images/discoverpsace01.jpg" alt="">
                </div>
                <div class="ps-text">
                    <div class="pstext-top">
                      <h3>12th Ave E</h3>
                      <div class="ps-avail">Hourly • Daily • Monthly</div>
                      <div class="ps-price">$83<span>/day</span></div>
                    </div>
                    <div class="pstext-btm">
                      <fieldset>
                      <div class="rating">
                          <input type="radio" id="star5-3" name="rating" value="5" />
                          <label class = "full" for="star5-3" title="Awesome - 5 stars"></label>
                          <input type="radio" id="star4-3" name="rating" value="4" />
                          <label class = "full" for="star4-3" title="Pretty good - 4 stars"></label>
                          <input type="radio" id="star3-3" name="rating" value="3" />
                          <label class = "full" for="star3-3" title="Meh - 3 stars"></label>
                          <input type="radio" id="star2-3" name="rating" value="2" />
                          <label class = "full" for="star2-3" title="Kinda bad - 2 stars"></label>
                          <input type="radio" id="star1-3" name="rating" value="1" />
                          <label class = "full" for="star1-3" title="Sucks big time - 1 star"></label>
                      </div>
                      <span>23</span>
                    </fieldset>
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
            <div class="ps-box">
                <div class="ps-img">
                  <img src="images/discoverpsace01.jpg" alt="">
                </div>
                <div class="ps-text">
                    <div class="pstext-top">
                      <h3>12th Ave E</h3>
                      <div class="ps-avail">Hourly • Daily • Monthly</div>
                      <div class="ps-price">$83<span>/day</span></div>
                    </div>
                    <div class="pstext-btm">
                      <fieldset>
                      <div class="rating">
                          <input type="radio" id="star5-4" name="rating" value="5" />
                          <label class = "full" for="star5-4" title="Awesome - 5 stars"></label>
                          <input type="radio" id="star4-4" name="rating" value="4" />
                          <label class = "full" for="star4-4" title="Pretty good - 4 stars"></label>
                          <input type="radio" id="star3-4" name="rating" value="3" />
                          <label class = "full" for="star3-4" title="Meh - 3 stars"></label>
                          <input type="radio" id="star2-4" name="rating" value="2" />
                          <label class = "full" for="star2-4" title="Kinda bad - 2 stars"></label>
                          <input type="radio" id="star1-4" name="rating" value="1" />
                          <label class = "full" for="star1-4" title="Sucks big time - 1 star"></label>
                      </div>
                      <span>23</span>
                    </fieldset>
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
            <div class="ps-box">
                <div class="ps-img">
                  <img src="images/discoverpsace01.jpg" alt="">
                </div>
                <div class="ps-text">
                    <div class="pstext-top">
                      <h3>12th Ave E</h3>
                      <div class="ps-avail">Hourly • Daily • Monthly</div>
                      <div class="ps-price">$83<span>/day</span></div>
                    </div>
                    <div class="pstext-btm">
                      <fieldset>
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
                      <span>23</span>
                    </fieldset>
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 ps-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7441.412572122276!2d79.06870567471097!3d21.16408394370072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0fcf85ee143%3A0x8a9261908197e622!2sSadar%2C+Nagpur%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1553691732461" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section><!-- filter-result -->

</div><!-- all-properties -->
 
</div><!-- site-content -->


@stop

