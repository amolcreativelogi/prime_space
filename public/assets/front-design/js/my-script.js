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
				$('#'+ID+ ' .msg-gloabal').removeClass('alert alert-success');
				$('#'+ID+ ' .msg-gloabal').addClass('alert alert-danger');
				$('#'+ID+ ' .msg-gloabal').html(data.response.msg);
				//loaderOut({status:0,msg:data.response.msg,url:data.url});
			}else{

				$('#'+ID+ ' .msg-gloabal').removeClass('alert alert-danger');
				$('#'+ID+ ' .msg-gloabal').addClass('alert alert-success');
				$('#'+ID+ ' .msg-gloabal').html(data.response.msg);
				$('#'+ID)[0].reset();
				if(data.url != '')
				{
					window.location = data.url;
				}
			}
			
		}
	});	
	return false;
}
//----------------- Validation of registration form ----------------//
$(function(){
	//Registration Form
	 $('#form-signup').validate({
		rules: {
				firstname: {
				   required : true,
		    	   minlength   : 3,
				},
				lastname: {
				   required : true,
		    	   minlength   : 3,
				},
				email_id: {
				   required: true,
				   email: true
				},
				password: {
					required: true,
					minlength: 5,
				}
			},
		messages: {
				 firstname:{
					required :"First Name field is required",
				 }, 
				 lastname:{
					required :"Last Name field is required",
				 },
				 email_id:{
					required :"Email Address field is required",
				 },
				 password:{
					required :"Password field is required",
				 }
			},
		submitHandler: function(form) {

			if ($("#dob_month").val() == ''){
			    // Do your stuff here
			    $('#dob_id-error').show().html('Select date of birth month'); 
			    return false;
			} else {
				$('#dob_id-error').show().html(''); 
			}

			if ($("#dob_day").val() == ''){
			    // Do your stuff here
			    $('#dob_id-error').show().html('Select date of birth day'); 
			    return false;
			} else {
				$('#dob_id-error').show().html(''); 
			}

			if ($("#dob_year").val() == ''){
			    // Do your stuff here
			    $('#dob_id-error').show().html('Select date of birth year'); 
			    return false;
			} else {
				$('#dob_id-error').show().html(''); 
			}


			if ($("input[name='user_type_id']:checked").length == 0){
			    // Do your stuff here
			    $('#user_type_id-error').show().html('Select any one account type'); 
			    return false;
			} else {
				$('#user_type_id-error').show().html(''); 
			}


			if($('#privacy_policy_check').is(":checked")){
				lkForms('form-signup');
				$('#terms-error').show().html(''); 
				//$(window).scrollTop(0);
			}else{
				$('#terms-error').show().html('Terms of service select is required'); 
			}
			//form.submit();
		  }
	 });
});


//----------------- Validation of registration form ----------------//
$(function(){
	//Registration Form
	 $('#form-login').validate({
		rules: {
				email_id: {
				   required: true,
				   email: true
				},
				password: {
					required: true,
					minlength: 5,
				}
			},
		messages: {
				 email_id:{
					required :"Email Address field is required",
				 },
				 password:{
					required :"Password field is required",
				 }
			},
		submitHandler: function(form) {
			lkForms('form-login');
			//form.submit();
		  }
	 });
});

//----------------- Validation of forgot password form ----------------//
$(function(){
	//Registration Form
	 $('#form-password').validate({
		rules: {
				email_id: {
				   required: true,
				   email: true
				}
			},
		messages: {
				 email_id:{
					required :"Email Address field is required",
				 }
			},
		submitHandler: function(form) {
			lkForms('form-password');
			//form.submit();
		  }
	 });
});

jQuery.datetimepicker.setLocale('en');

jQuery('#from').datetimepicker({
 timepicker:false,
 format:'m.d.Y'
});
jQuery('#search_dates').datetimepicker({
 //timepicker:false,
 format:'m.d.Y'
});
jQuery('#land-search_dates').datetimepicker({
 timepicker:false,
 format:'m.d.Y'
});
jQuery('#search_dates1').datetimepicker({
 //timepicker:false,
 format:'m.d.Y'
});
jQuery('#land-search_dates1').datetimepicker({ 
 timepicker:false,
 format:'m.d.Y'
});
jQuery('#to').datetimepicker({
 timepicker:false,
 format:'m.d.Y'
});
jQuery('#from_date').datetimepicker({
 timepicker:false,
 format:'m.d.Y'
});
jQuery('#to_date').datetimepicker({
 timepicker:false,
 format:'m.d.Y'
});
$('#from_time').datetimepicker({
  datepicker:false,
  format:'H:i'
});
$('#to_time').datetimepicker({
  datepicker:false,
  format:'H:i'
});
$('#to_time').datetimepicker({
  datepicker:false,
  format:'H:i'
});


$(".modal").on("hidden.bs.modal", function(){

	 $('#form-signup, #form-login, #form-password')
    .find("input[type=text],textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
     //$('form:first *:input[type!=hidden]:first').focus();
	//alert();
	//$('#form-signup, #form-login, #form-password')[0].reset();
    $('.msg-gloabal').removeClass('alert alert-danger');
	$('.msg-gloabal').removeClass('alert alert-success');
	$('.msg-gloabal').html('');

});

$('#singupModal, #loginModal, #resetpassModal').on('shown.bs.modal', function() {
  $('#email_id, #email_id_login, #forgot_password_email').focus();
})


