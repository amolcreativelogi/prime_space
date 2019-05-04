<footer id="footer"><a href="#">Pryme Space</a> © - 2018 All Rights Reserved.<br></footer>
</div>
</body>
</html>
<script type="text/javascript">
	  // A $( document ).ready() block.
//$( document ).ready(function() {

//$( document ).ajaxComplete(function() {
   var baseurl = '<?php echo url('/'); ?>'; 
   var postUrl  = '<?php echo url('/admin/roles/getUnauthorizedRoles/'.$_SESSION['admin_login_id'].'/footer'); ?>';
   $.get(postUrl, function( data ) {

    	 if(data != ''){

	      var json = $.parseJSON(data);
	     
	      $.each(json, function(index,value) {
	       		//hide list/add/update sequence button
		        if(value['action_name']=='add' || value['action_name']=='list' || value['action_name']=='update_sequence'){
		         
		          var elements = $('a[href="'+baseurl+value['route_url']+'"]').remove();
		        }
		     
	       });
    	}
    }); 




//});
</script>
