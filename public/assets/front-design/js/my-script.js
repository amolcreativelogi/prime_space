/*---------- Jquery Form Validation with PHP Form Data -----*/
/*---------------------------------------------------------
/*----------------| Lomesh Kelwadkar  |--------------------
/*----------------| Version : 1.0     |--------------------
/*----------------| Date : 23/09/2016 |--------------------
/*----------------| Nagpur    		  |--------------------
/*----------------| LK Group		  |--------------------
/*------------------------------------------------------*/
/*$(document).ready(function(){
		loaderIn();
		loaderOut();
	});*/
	//Start Loader
	
	
	var $loading = $('.loader,.loader-inner').hide();
                   //Attach the event handler to any element
                   $(document)
                     .ajaxStart(function () {
                        //ajax request went so show the loading image
                         $loading.show();
                     })
                   .ajaxStop(function () {
                       //got response so hide the loading image
                        $loading.hide();
                    });
	
	function loaderIn()
	{
		$('.loader,.loader-inner').show();
	}
	//Hide Loader with check status
	function loaderOut(test)
	{
		$('.loader').fadeOut(1000,function(){
			//console.log(test);
			if(typeof(test) != "undefined"){
				if(test.status == 1){
					get_success(test.msg,test.url);
				}else{
					get_error(test.msg,test.url);
				}
			}
		});
	}
	//Get Success msg
	function get_success(msg,url){
		if(msg){
			$('.globel-msg').removeClass('g-error');
			$('.globel-msg').fadeIn('slow').html(msg);
			$('.globel-msg').addClass('g-success');
			$('.globel-msg').fadeOut(5000,function(){
				if(url){
					window.location.assign(url);
				}	
			});
		}
	}
	//Get Success msg
	function get_error(msg,url){
		$('.globel-msg').removeClass('g-success');
		$('.globel-msg').fadeIn('slow').html(msg);
	    $('.globel-msg').addClass('g-error');
	    $('.globel-msg').fadeOut(5000,function(){
			if(url){
				window.location.assign(url);
			}	
		});
	}


//Only Number
$(function() {
  $('.number').on('keydown',  function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
  
	$('.textName11').on('keydown',  function(e){
		 var regex = new RegExp(/^[a-zA-Z\s]+$/);
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if (regex.test(str)) {
				return true;
			}
			else
			{
			e.preventDefault();
			//alert('Please Enter Alphabate');
			return false;
			}
	});
  
})
/* --------------- Lk Submit forms ---------------------*/
function lkForms(ID){
	var url = $('#'+ID).attr('url');
	var data = new FormData($('#'+ID)[0]);
	$.ajax({
		type:'POST',
		url:url,
		data:data,
		dataType:'json',
		processData: false,
		contentType: false,
		beforeSend: function(data){
			//loaderIn();
		},
		success: function (data) {
			if(data.status == false){
				$('.msg-gloabal').html(data.response.msg);
				//loaderOut({status:0,msg:data.response.msg,url:data.url});
			}else{
				$('.msg-gloabal').html(data.response.msg);
				$('#'+ID)[0].reset();
				//loaderOut({status:1,msg:data.response.msg,url:data.url});
			}
			
		}
	});	
	return false;
}
//----------------- Validation of registration form ----------------//
$(function(){
	//Registration Form
	 $('#registration_user').validate({
		rules: {
				first_name: {
				   required : true,
		    	   minlength   : 3,
				},
				last_name: {
					required: true,
					minlength: 3,
				},
				email_address: {
					required: true,
					email: true
				},
				standard_class_id: {
					required: true,
				},
				user_password: {
					required: true,
					minlength: 5,
				},
				user_cpassword: {
					required: true,
					equalTo: "#user_password"
				},
				school_collage: {
					required: true,
				},
			},
		messages: {
				 first_name:{
					required :"First Name field is required",
				 }, 
				 last_name:{
					required :"Last Name field is required",
				 },
				 email_address:{
					required :"Email Address field is required",
				 },
				 standard_class_id:{
					required :"Standard/Class field is required",
				 },
				 user_password:{
					required :"Password field is required",
				 },
				  user_cpassword:{
					required :"Confirm Password field is required",
					equalTo :"Password and confirmation password do not match",
				 },
				 school_collage:{
					required :"School/College field is required",
				 },
			},
		submitHandler: function(form) {
			if($('#tearm_conditions').is(":checked")){
				$('#tearm').html(''); 
				lkForms('registration_student');
				$(window).scrollTop(0);
			}else{
				$('#tearm').show().html('Terms and Conditions field is required'); 
			}
			//form.submit();
		  }
	 });
});

$(function(){
	//Registration Form
	 $('#registration_teacher').validate({
		rules: {
				first_name: {
				   required : true,
		    	   minlength   : 3,
				},
				last_name: {
					required: true,
					minlength: 3,
				},
				email_address: {
					required: true,
					email: true
				},
				subject_class_id: {
					required: true,
				},
				user_password: {
					required: true,
					minlength: 5,
				},
				user_cpassword: {
					required: true,
					equalTo: "#user_password"
				},
				organization: {
					required: true,
				},
				your_phone: {
					required: true,
					digits: true,
					minlength: 8,
					maxlength: 10
				},
				organization_phone_number: {
					digits: true,
					minlength: 8,
					maxlength: 10
				},
			},
		messages: {
				 first_name:{
					required :"First Name field is required",
				 }, 
				 last_name:{
					required :"Last Name field is required",
				 },
				 email_address:{
					required :"Email Address field is required",
				 },
				 subject_class_id:{
					required :"Subject field is required",
				 },
				 user_password:{
					required :"Password field is required",
				 },
				  user_cpassword:{
					required :"Confirm Password field is required",
					equalTo :"Password and confirmation password do not match",
				 },
				 organization:{
					required :"Organization field is required",
				 },
				 your_phone:{
					required :"Your Phone field is required",
				 }
			},
		submitHandler: function(form) {
			if($('#tearm_conditions').is(":checked")){
				$('#tearm').html(''); 
				lkForms('registration_teacher');
				$(window).scrollTop(0);
			}else{
				$('#tearm').show().html('Terms and Conditions field is required');
				//$(window).scrollTop(0); 
			}
			//form.submit();
		  }
	 });
});