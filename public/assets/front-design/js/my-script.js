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
				if(ID == 'form-signup')
				{	
					$('.loginModal').trigger('click');
					$('#form-login .msg-gloabalsuccess').addClass('alert alert-success');
					$('#form-login .msg-gloabalsuccess').html('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+data.response.msg);
				} else {
					$('#form-login .msg-gloabalsuccess').removeClass('alert alert-success');
					$('#form-login .msg-gloabalsuccess').html('');
				}
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
				},
				password: {
					required: true,
					minlength: 5,
				},
				privacy_policy_check: {
					required: true
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
				 },
				 privacy_policy_check:{
					required :"Please check terms of use & privacy policy",
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

			lkForms('form-signup');
			// if($('#privacy_policy_check').is(":checked")){
			// 	lkForms('form-signup');
			// 	$('#terms-error').show().html(''); 
			// 	//$(window).scrollTop(0);
			// }else{
			// 	$('#terms-error').show().html('Terms of service select is required'); 
			// }
			//form.submit();
		  }
	 });
});


//----------------- Validation of update password ----------------//
$(function(){
	//Registration Form
	 $('#update-profile').validate({
		rules: {
				firstname: {
				   required: true
				},
				lastname: {
				   required: true
				},
				contact_no: {
					required: false,
					digits: true,
					minlength: 8,
					maxlength: 10
				},
				zipcode: {
					required: false,
					digits: true,
					minlength: 5,
					maxlength: 6
				}
			},
		messages: {
				  firstname:{
					required :"First Name field is required",
				 }, 
				 lastname:{
					required :"Last Name field is required",
				 }, 
				 contact_no:{
					minlength: "phone no should be between 8 to 10 character",
					maxlength: "phone no should be between 8 to 10 character",
				 }, 
				 zipcode:{
					minlength: "phone no should be between 5 to 6 character",
					maxlength: "phone no should be between 5 to 6 character",
				 } 
			},
		submitHandler: function(form) {
			lkForms('update-profile');
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
 format:'m.d.Y',
  minDate: 0
});
jQuery('#to').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#monthly_from').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
 minDate: 0
});

jQuery('#monthly_to').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
 //maxDate:'+1m +0d',
  minDate: 0
});
jQuery('#daily_from').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#daily_to').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#weekly_from').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#weekly_to').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#land-monthly_from').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#land-monthly_to').datetimepicker({ 
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#search_dates').datetimepicker({
 timepicker:true,
 format:'m.d.Y H:i',
 minDate: 0,
// minTime: 0
});
jQuery('#land-search_dates').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#search_dates1').datetimepicker({
 //timepicker:false,
 //format:'m.d.Y'
 format:'m.d.Y H:i',
  minDate: 0.0,
});
jQuery('#land-search_dates1').datetimepicker({ 
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#to').datetimepicker({
 timepicker:false,
 format:'m.d.Y',
  minDate: 0
});
jQuery('#from_date').datetimepicker({
 //timepicker:false,
format:'m.d.Y H:i',
 minDate: 0,
 //minTime: 0
});
jQuery('#to_date').datetimepicker({
 //timepicker:false,
format:'m.d.Y H:i',
 minDate: 0,
 //minTime: 0
});
$('#from_time').datetimepicker({
  datepicker:false,
  format:'H:i',
   minDate: 0
});
$('#to_time').datetimepicker({
  datepicker:false,
  format:'H:i',
   minDate: 0
});
$('#to_time').datetimepicker({
  datepicker:false,
  format:'H:i',
   minDate: 0
});

jQuery('#sunday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#sunday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#monday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#monday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#tuesday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#tuesday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#wednesday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#wednesday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#thursday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#thursday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#friday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#friday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#saturday-from').datetimepicker({
 datepicker:false,
 format:'H:i',
});
jQuery('#saturday-to').datetimepicker({
 datepicker:false,
 format:'H:i',
});

jQuery('#transfromdate').datetimepicker({
   timepicker:false,
 format:'m.d.Y',
  minDate: 0
 ///format:'H:i',
});
jQuery('#transtodate').datetimepicker({
  timepicker:false,
 format:'m.d.Y',
  minDate: 0
 //format:'H:i',
});


$('#from_date').change(function(){
  var home_search_datetime = $('#from_date').val();
  var split_home_search_datetime = home_search_datetime.split(' ');
  var home_search_frmdate =split_home_search_datetime[0];
  var home_search_frmtime =split_home_search_datetime[1];
  //var home_search_frmtime_obj = home_search_datetime.split(' ');
  var hour = home_search_frmtime;//home_search_frmtime_obj[1];
  var hoursplit = hour.split(':');
  //alert(home_search_frmdate);
  var home_search_totime  = parseInt(hoursplit[0])+parseInt(1)+':'+hoursplit[1];

  var to_date = home_search_frmdate+' '+home_search_totime;
  $('#to_date').val(to_date);
  //alert(to_date);
})


// $('#from').change(function(){

// // 	var date2 = $('#from').datepicker('getDate');
// // var nextDayDate = new Date();
// // nextDayDate.setDate(date2.getDate() + 1);
// // 	alert(nextDayDate);
// 	var dateStr = $('#from').val();
// 	var days = 1;
// 	var result = new Date(new Date(dateStr).setDate(new Date(dateStr).getDate()));


// 	var r = (result.getMonth()+1)+'.' + result.getDate() + '.'+result.getFullYear();

// 	$('#to').val(r);
// })



$('#from').change(function(){
	var dateStr = $('#from').val();
	//var days = 29;
	var result = new Date(new Date(dateStr).setDate(new Date(dateStr).getDate()));
	var r = result.getMonth()+'.' + (result.getDate()+1) + '.'+result.getFullYear();
	$('#to').val(r);
})


$('#monthly_from').change(function(){
	var dateStr = $('#monthly_from').val();
	//var days = 29;
	var result = new Date(new Date(dateStr).setDate(new Date(dateStr).getDate()));
	var r = (result.getMonth()+2)+'.' + result.getDate() + '.'+result.getFullYear();
	$('#monthly_to').val(r);
})


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


