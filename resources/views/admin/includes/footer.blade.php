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
   $.get(postUrl, function(data) {
   		
    	 if(data != ''){
	      var json = $.parseJSON(data);

	      //hide not assigned action inside left main menu
	      $.each(json.notAssignedActions, function(index,value) {
	       		//hide list/add/update sequence button
		        if(value['action_name']=='add' || value['action_name']=='list' || value['action_name']=='update_sequence'){
		          var elements = $('a[href="'+baseurl+value['route_url']+'"]').remove();
		        }
		     
	       });
	      if(json.notAssignedMenus != ''){
	      	//hide not assigned left main menu
	       $.each(json.notAssignedMenus, function(index,value) {
		      $('li[id="'+value['main_module_key']+'"]').remove();
	       });
	       //$('li[id="dashboard"]').remove();
	      }
	      
    	}
    }); 




//});
</script>
