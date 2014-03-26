<?php
	if($this->session->userdata('post_id') !== 0 ){
		$this->session->unset_userdata('post_id');
	}

?>
<?php
	include('include/front_header.php');

?>
	<div class="container" id="wrapper" style="width:100%;margin:0 auto;margin-top:115px;">
		<div style="width:1064px;margin:auto;;">
     		 <div class="row" style="margin:12px auto; width:1010px; min-width:1010px; background:#fbf7f8;">
	  			<h1>Post your ad</h1>
					<input type="hidden" name="category_id" id="category_id" value="<?php echo $sub_category->category_id  ?>"/>
					<input  type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo $sub_category_id  ?>"/>
					chosen category : <?php echo $category->category_name,'>', $sub_category->sub_category_name ; ?>
					<br/>
					<br/>
					ad title : <input type="text" name="title" id="title"/>
					<div id="title_error" style="color:red;">
			
					</div>
					<br/>
					<br/>
					<input type="file" name="userfile" id="userfile" size="20" />
					<input type="button" name="submit" id="submit" value="upload"/>
		
					<div id="thumb">
			
					</div>
					<br/>
					<br/>
					Description : <textarea cols="40" id="description"></textarea>
					<div id="description_error" style="color:red;">
			
					</div>
					<br/>
					<br/>
					price : <input type='text' name="price" id="price" onkeypress='validate(event)' placeholder="your price" />
					<br/>
					<br/>
					
				<h1>Seller Information</h1>	
					I am :<input type="radio" name="seller_type" value="individual"/>Individual <input type="radio" name="seller_type" value="buisiness_man"/> Buisiness man
					<br/>
					<br/>
					Contact Name:<input type="text" name="contact_name"  id="contact_name"/>
					<div id="contact_name_error"style="color:red;">
			
					</div>
					<br/>
					<br/>
					 Email:<input type="email" name="contact_email" id="contact_email" />
					 <div id="contact_email_error"style="color:red;">
			
					</div>
					 <br/>
					<br/>
					Phone NUmber <input type="text" name="phone" id="phone" onkeypress='validate(event)' />
					<div id="phone_error" style="color:red;">
			
					</div>
					<br/>
					<br/>
					Location : 
					<select name="state" id="state">
						<option value=" ">Select Your State</option>
						<?php
							foreach($states as $state){
								echo '<option value=',$state->state_id,'>',$state->state_name,'</option>';
							}
						?>	
					</select>
					<div id="city">
						
					</div>
					<div id="location" style="color:red;">
			
					</div>
					
					
					<br/>
					<br/>
					<input type="button" name="submit" value="Post" id="post"/>
	 		 </div>
	 	 </div>
	</div>
		
		
<!--price field should contain only numbers	-->	
<script>
	function validate(evt) {
	  var theEvent = evt || window.event;
	  var key = theEvent.keyCode || theEvent.which;
	  key = String.fromCharCode( key );
	  var regex = /[0-9]|\./;
	  if( !regex.test(key) ) {
	    theEvent.returnValue = false;
	    if(theEvent.preventDefault) theEvent.preventDefault();
  	}
}
</script>

		
<script src="<?php echo base_url();?>style/js/nicEdit.js"></script>

<script>
		var base_url="<?php echo base_url(); ?>";
</script>

<script>
	$('#state').change(
			function(){
				var state=$('#state').val();
				$.post(base_url + "upload/select_city",{'state':state},function(data){
					$('#city').html(data);
					$('#location').html("Select Your city *");
				});
			}
		
	);	
</script>
<script>
	$('#post').click(
		function(){
			var flag=0;
			var category_id=$('#category_id').val();
			var sub_category_id=$('#sub_category_id').val();
			var title=$('#title').val();
			var nicE = new nicEditors.findEditor('description');
			var description = nicE.getContent();
			var price=$('#price').val();
			var seller_type=$("input:radio[name=seller_type]:checked").val();
			var contact_name=$('#contact_name').val();
			var contact_email=$('#contact_email').val();
			var phone=$('#phone').val();
			var state_id=$('#state').val();
			
			if(title == ""){
				flag=1;
				$('#title_error').html("Enter Your title *");
				$('body').scrollTop(0);
			}else{
				$('#title_error').html("");
			}
			
			if( description == "<br>" || description == ""){
				$('#description_error').html("Fil this area *");
				$('body').scrollTop(0);	
			}else{
				$('#description_error').html("");
			}
			
			if($('#contact_name').val() == ""){
				flag=1;
				$('#contact_name_error').html("Fille this area *");	
			}else{
				$('#contact_name_error').html("");
			}
			
			
			
			if(!validateEmail($('#contact_email').val())){
					flag=1;
					$('#contact_email_error').html("Enter a valid email *");
			}else{
				$('#contact_email_error').html("");
			}
			
			if($('#state').val() == " "){
				flag=1;
				$('#location').html("Select Your state *");
			}else{
				if($('#city_name').val() == " "){
					flag=1;
					$('#location').html("Select Your city *");
				}else{
					var city_id=$('#city_name').val();
					$('#location').html("");
				}	
			}
			
			if(flag == 0){
				var datas='category_id='+ category_id + '&sub_category_id=' + sub_category_id + '&title=' + title + '&description=' + description + '&price=' + price + '&seller_type=' + seller_type + '&contact_name=' + contact_name + '&contact_email=' + contact_email + '&phone=' + phone + '&state_id=' + state_id + '&city_id=' + city_id ;
				$.ajax({
					type: "POST",    
					url: base_url + 'upload/post',
					data: datas,
					success: function(msg)
					{
						if(msg == 0){
							alert('some error occured');
						}else if(msg == 1){
							window.location.href=base_url + 'home';
						}
					}
					
				});
			}
			
			function validateEmail(email) { 
				var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
	
		}

		
	
	);
</script>
<!--<script>
	window.onbeforeunload = function(event)
    {
        return confirm("");
    };
	
</script>-->
<script> //may not be neccesary for your code

	window.onbeforeunload=before;
	window.onunload=after;

	function before(evt)
	{
	   return "";
	   //If the return statement was not here, other code could be executed silently (with no pop-up)
	}

	function after(evt)
	{
	   //This event fires too fast for the application to execute before the browser unloads
	}

</script>
<?php
	include('include/front_footer.php');
?>