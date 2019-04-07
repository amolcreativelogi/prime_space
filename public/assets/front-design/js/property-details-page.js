
//show calebders on property details page on frontend
jQuery('#bookfromdate').datetimepicker({
 timepicker:true,
 format:'m.d.Y H:i:s'
});
jQuery('#booktodate').datetimepicker({
 timepicker:true,
 format:'m.d.Y H:i:s'
});

//Book 
function bookProperty(property_id,module_id)
  {
        
    var txt;
    var r = confirm("Do you really want to book a property ?");
    if (r == true) {
     // var formData = $('#booking-form').serializeArray();
      var url = baseurl+'/frontend/bookProperty';
     // alert(url);

      var bookfromdate = $("#bookfromdate").val();
      var booktodate = $("#booktodate").val();
      var moduleid = $("#module_id").val();
      var propertyid = $("#property_id").val();
      var durationtype = $("#duration_type").val();

      var dataString = 'bookfromdate=' + bookfromdate + '&booktodate=' + booktodate + '&moduleid=' + moduleid + '&propertyid=' + propertyid+ '&durationtype=' + durationtype;
      $.ajax({
      method: 'POST',
      url: url,
      data: dataString,
      //data: {'form_data':formData,'_token':"{{ csrf_token() }}"}
      //data: {'property_id':property_id,'module_manage_id':module_manage_id,'_token':"{{ csrf_token() }}"}
      })
      .done(function(response) {
        alert(response);
        var json = $.parseJSON(response); 
        alert(json);
            /*var getBookingDurationType=json.getBookingDurationType;
            var getLocationTypes=json.getLocationTypes;
            var getAmenities=json.getAmenities;*/
            
      }); 
       alert('hi');  
      //txt = "You pressed OK!";
    } else {
      //txt = "You pressed Cancel!" document.getElementById("demo").innerHTML = txt;;
    }
        
        
         
         
  }
