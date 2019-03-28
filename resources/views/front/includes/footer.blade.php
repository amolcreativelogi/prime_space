
<footer class="site-footer">
	<div class="container">
		<div class="foot-top">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6">
					<a href="" class="foot-logo"><img src="{{ URL::asset('public') }}/assets/front-design/images/psw-logo.png" alt=""></a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<h4>Company</h4>
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Mission</a></li>
						<li><a href="#">Vision</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Press</a></li>
						<li><a href="#">FAQ's</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<h4>Hosts</h4>
					<ul>
						<li><a href="#">Benefits for Hosting with Us</a></li>
						<li><a href="#">Become a Host</a></li>
						<li><a href="#">Host FAQ's </a></li>
						<li><a href="#">Community</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<h4>Renter</h4>
					<ul>
						<li><a href="#">Benefits for Renting with Us</a></li>
						<li><a href="#">Become a Renter</a></li>
						<li><a href="#">Renter FAQ's </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="foot-btm">
			<ul>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Privacy Statement</a></li>
			</ul>
			<div class="copyright">© 2019 Pryme Space, Inc.</div>
			<ul class="foot-social">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</footer>



<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://alkurn.info/html/Prymespace/js/jquery.easing.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/popper.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/common.js"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/my-script.js"></script>




</body>
</html> 



<script>
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
  return false;
})

});
</script>