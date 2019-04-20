@extends('front/layouts.default')
@section('content')

<div class="site-content">

  <section class="homebanner">
    <video autoplay muted loop id="myVideo">
      <source src="{{ URL::asset('public') }}/assets/front-design/video/prymespaces.mp4" type="video/mp4">
    </video>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
          <div class="homebannertext">
            <div id="homeban-text" class="owl-carousel owl-theme">
                <div class="item">
                  <h1>Find a space for <br> storing your motorcycle</h1>
                <p>Prymespace helps connect you with the perfect space,<br> whatever your needs</p>
                </div>
                <div class="item">
                  <h1>Find a space for <br> storing your motorcycle</h1>
                <p>Prymespace helps connect you with the perfect space,<br> whatever your needs</p>
                </div>
                <div class="item">
                  <h1>Find a space for <br> storing your motorcycle</h1>
                <p>Prymespace helps connect you with the perfect space,<br> whatever your needs</p>
                </div>
            </div>
            
           <!--  <form action="{{ URL::asset('search_pryme_space') }}/" method="get"> -->
              <select required id="select-property-type" name="module_manage_id" class="type">
                  <option value="">Choose a category</option>
                  <?php foreach($getModuleCategories as $category){ ?>
                      <option value="<?php echo $category->module_manage_id ?>"><?php echo $category->module_manage_name ?></option>
                      <?php } ?>
                     </select>
                  <div class="error from_parkingtype"></div>
                  <input type="text" name="location" id="location" placeholder="Location" class="location" autocomplete="on" runat="server">
                  <div class="error from_location"></div>
                  <input type="hidden" id="city" name="city" />
                  <input type="hidden" name="latitude" id="latitude">
                  <input type="hidden" name="longitude" id="longitude">

              <input type="text" name="search_dates" placeholder="Dates" id="search_dates1" class="dates">
              <div class="error from_search_dates"></div>
              <!--<input type="text" name="land-search_dates1" placeholder="Dates" id="land-search_dates1" class="dates" styel="display:none">-->
              <input type="button" name="search" id="search" onclick="searchURL()" value="Search">
           <!--  </form> --> 
          </div>
        </div>
        <div class="col-lg-6 col-md-4 col-sm-12"></div>
      </div>
    </div>
  </section><!-- homebanner -->

  <section class="whatabout">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
          <h2>What we're about</h2>
          <p>The Prymespace marketplace provides unprecedented access to unique spaces across your city and globe. Need to store a couch? Find an office space? Host an event? We’ve got you covered with spaces for:</p>
          <ul>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/parked-car.svg" alt="">Parking</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/events.svg" alt="">Events</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/storage.svg" alt="">Storage</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/office.svg" alt="">Office</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/Land-Icon.png" alt="">Land</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/residential.svg" alt="">Residential</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/industrial.svg" alt="">Industrial</li>
            <li><img src="{{ URL::asset('public') }}/assets/front-design/images/warehouse.svg" alt="">Warehouse</li>
          </ul>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <div id="whatabout" class="owl-carousel owl-theme">
              <div class="item">
                <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace01.jpg" alt="">
                <div class="slide-caption">Office space  •  Seattle  •  $125 / day</div>
              </div>
              <div class="item">
                <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace02.jpg" alt="">
                <div class="slide-caption">Office space  •  Seattle  •  $125 / day</div>
              </div>
              <div class="item">
                <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace03.jpg" alt="">
                <div class="slide-caption">Office space  •  Seattle  •  $125 / day</div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- whatabout -->


  <section class="why-prymespace">
    <div class="container">
      <h2>Why Prymespace?</h2>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="why-pryme">
            <h4>The best prices</h4>
            <p>We ensure the best price and market recommendations for every budget. Our hosts can use our smart pricing recommendation with dynamic pricing or set their own pricing. Our network of spaces let users find exactly what best suits their needs and budget.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="why-pryme">
            <h4>Unique spaces</h4>
            <p>Pryme Space provides free or low-cost visibility of spaces to users worldwide, and quick and seamless cash flow to hosts by integrating IoT into our platform for Smart City use, as well as other areas.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="why-pryme">
            <h4>Intelligent platform</h4>
            <p>Our unique set of intelligent AI tools enable users to instantly find the perfect spaces for their use, saving them tons of time. Rating and review systems and other protections that are provided on our platform enable both hosts and users the peace of mind to share or use their space.</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- why-prymespace -->

  <section class="how-works">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
          <div class="howworks-box">
            <h2>How it work</h2>
            <ul>
              <li>
                <span>1</span>
                <h4>Find the perfect space</h4>
                <p>Whatever your vision, we help connect you with the perfect space to fulfil it.</p>
              </li>
              <li>
                <span>2</span>
                <h4>Book it with ease</h4>
                <p>Just set the rental duration then checkout and you’re ready to begin utilizing your new space.</p>
              </li>
              <li>
                <span>3</span>
                <h4>Use & Enjoy</h4>
                <p>Nulla vulputate interdum tortor, in auctor lorem sollicitudin ac.</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <div class="howworks-img">
            <img src="{{ URL::asset('public') }}/assets/front-design/images/howworks-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section><!-- how-works -->

  <!-- <section class="book-space">
      <div class="container">
        <h2>Book a space that suits you</h2>
        <h5>Be inspired to search, book and use</h5>
        <div id="book-space" class="owl-carousel owl-theme">
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
          <div class="bookspace-box item">
            <div class="bookspace-img">
              <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space1.jpg" alt="">
              <span><i class="fa fa-heart-o" aria-hidden="true"></i></span>
            </div>
            <div class="bookspace-Text">
              <h4>Perfect Event for 100 People</h4>
              <div class="category">Category: Parking</div>
              <div class="streetadd"><i class="fa fa-map" aria-hidden="true"></i> Fashin Street Las Vegas Nevada</div>
              </div>
          </div>
        </div>
      </div>
    </section> --><!-- book-space -->

    <section class="testimonial">
      <div class="container">
        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-12"></div>
          <div class="col-lg-10 col-md-10 col-sm-12">
            <div id="testimonial" class="owl-carousel owl-theme">
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">We live next to the Rose Parade course and used to stand outside with a parking sign early in the morning. Pryme Space made it easy to list my driveway and received reservations without me getting out of bed.<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                      <span class="author-name">Matt W</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">With the Pryme Space app, I was able to locate and reserve a parking space as I’m driving to a concert within minutes. I didn’t have to go searching in the depths of downtown to find parking at a great value.<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                      <span class="author-name">Robert Y</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">My land was going through a crop rotation, so instead of an empty parcel, Pryme Space helped us connect with an organization that was looking for a space for their military-style bootcamp obstacle course.<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">We were able to find this gorgeous vineyard through Pryme Space and the owner was so responsive and accommodating. Messaging through the platform really helped.<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">Our non profit organization had to reduce the administrative costs at our centrally located office in Downtown Los Angeles. Pryme Space and our landlord allowed us to list our extra offices that helped reduce our indirect costs significantly, providing more funds towards our programs.<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="testimonial-img">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="testimonial-text">
                      <p><img src="{{ URL::asset('public') }}/assets/front-design/images/quote-left.svg" alt="" class="quote-left">In search of a short term office rental, we didn’t want to pay for a membership fee for services that we didn’t need since we wanted to hold our CPR/First Aid classes. Pryme Space’s app showed me photos, floorplans, and upfront pricing. Before we knew it, we unlocked the office that had a smart lock and voila!<img src="{{ URL::asset('public') }}/assets/front-design/images/quote-right.svg" alt="" class="quote-right"></p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12"></div>
        </div>
      </div>
    </section><!-- testimonial -->

    <section class="getstarted">
      <div class="container">
        <h2>Get started</h2>
        <a href="">Find a space</a>
          <?php
            if(isset($_SESSION['user']['is_user_login'])) { ?>
               <!-- <a href="">Find a space</a> -->
            <?php } else { ?>
            <a href="#" data-toggle="modal" class="singupModal popuplink" data-target="#singupModal">List your space</a>
          <?php } ?>
      </div>
    </section><!-- getstarted -->

</div><!-- site-content -->
@stop




