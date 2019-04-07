
//show calebders on property details page on frontend
jQuery('#bookfromdate').datetimepicker({
 timepicker:true,
 format:'m.d.Y H:i:s'
});
jQuery('#booktodate').datetimepicker({
 timepicker:true,
 format:'m.d.Y H:i:s'
});

//Book  property
function bookProperty(property_id,module_id)
  {
        
    var txt;
    var r = confirm("Do you really want to book a property ?");
    if (r == true) {
      //get variables
      var url = baseurl+'/frontend/bookProperty';
      var bookfromdate = $("#bookfromdate").val();
      var booktodate = $("#booktodate").val();
      var moduleid = $("#module_id").val();
      var propertyid = $("#property_id").val();
      var durationtype = $("#duration_type").val();

      var dataString = 'bookfromdate=' + bookfromdate + '&booktodate=' + booktodate + '&moduleid=' + moduleid + '&propertyid=' + propertyid+ '&durationtype=' + durationtype;
      //alert(dataString);
      $.ajax({
      method: 'POST',
      url: url,
      data: dataString
      })
      .done(function(response) {
        var json = $.parseJSON(response); 
        var className ="alert alert-"+json.status;
        var responseDiv='<div  class="'+className+'" style="display: block;"><span id="response">'+json.message+'</span><button type="button" class="close" data-dismiss="alert">×</button></div>';
          //$("#msg").addClass("alert alert-"+json.status);
        $("#msg").html(responseDiv);
           
      }); 
      
      
    }  
         
  }
