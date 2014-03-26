<?php
	include('include/front_header.php');

?> 
<div class="container " id="wrapper" style="margin:0 auto;margin-top:115px;"> 
     <div class="row" style="width:998px;padding:0;margin:0 auto;" >    
 
         <!-- AD List -->
         <div class="col-xs-12" id="adlist">
           <div class="jumbotron" id="adlisttop" style="width:998px;padding:0;background:#fafbfd">
             <div class="container">
               <div class="row">
                 <div class="col-xs-12" style="padding:0;margin:0;">
                   <div class="row" style="height:45px;background:#e5e5e5;padding:0;margin:0;">
                     <p style="font-size:15px;font-weight:bold;color:black;margin: 10px 0 10px 20px;padding:0 0 0 10px;">Profile</p>  
                   </div>
                   <div class="row" style="padding:0;margin:0;">
                      <p style="font-size:15px;font-weight:bold;color:black;margin: 10px 0 10px 20px;padding:0 0 0 10px;"> Personal Details</p>  
                      <div style="margin:0;padding:0 0 0 30px;">
                        <hr>
                        <div>
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Name</span><input type="text" value="<?php echo $user_details->username;  ?>" class="form-control" name="settings_name" id="settings_name"  style="width:220px;display:inline-block;"></p>
                        <div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="settings_name_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>


                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Email*</span><input type="text" value="<?php echo $user_details->email;  ?>" class="form-control" name="settings_email" id="settings_email" style="width:220px;display:inline-block;"></p>
                        <div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="settings_email_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Mobile Number*</span><input type="text" value="<?php echo $user_details->phone_number;  ?>" class="form-control" name="phone" id="phone" onkeypress='validate(event)' style="width:220px;display:inline-block;"></p>
						
						<div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="phone_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>
						
                        
						 <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">State*</span><select style="width:220px;display:inline-block;"name="state" id="state" class="form-control">
							<option value=" ">Select Your State</option>
							<?php
								foreach($states as $state){
									echo '<option value=',$state->state_id,'>',$state->state_name,'</option>';
								}
							?>
						</select>
						 </p>
						 <div id="city">
						
								</div>
							
						 
						<div class="row" style="margin:0 0 0 225px">
							<div id="location" style="color:red;font-size: 14px;">
			
							</div>
						</div>
						<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Are you a *</span>
<label style="font-weight:normal;"> <input type="radio" <?php if($user_details->seller_type == 'individual'){echo "checked";} ?> style="cursor:pointer;"  name="seller_type"  value="individual"><span style="cursor:pointer;"> Individual</span></label><label style="font-weight:normal;"><input type="radio" <?php if($user_details->seller_type == 'buisiness_man'){echo "checked";} ?> name="seller_type" value="buisiness_man" style="margin:0 0 0 15px;cursor:pointer;"><span style="cursor:pointer;"> Business</span></label></p>
                        
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Gender</span><select name="gender" id="gender" class="form-control" style="width:100px;display:inline-block;">
                        <?php 
                        	if($user_details->gender == 'm'){
                        ?>
                        	<option value="m">Male</option><option value="f">Female</option></select></p>
                        <?php
                        	}else{
                        ?>
                        	<option value="f">Female</option><option value="m">Male</option></select></p>
                        <?php
                        	} 
                        ?>  
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Age</span><input type="text" value="<?php echo $user_details->age; ?>"  name="age" id="age" class="form-control" onkeypress='validate(event)' style="width:65px;display:inline-block;"></p>
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Address</span><textarea name="address" class="form-control" id="address" style="width:295px;height:95px;display:inline-block;"><?php echo $user_details->address; ?></textarea></p>
                        </div>
                      </div>
                   </div>
                   
                   <div class="row">
                      
                      <div style="margin:0 0 0 20px;padding:0 0 0 30px;">
                        <hr>
                        <div>
						<button  class="btn btn-lg reply_back" id="reply" ><strong style="font-size:15px;">Edit</strong></button>
                        
                        
                        </div>
                      </div>
                   </div>
                 </div><!-- /.col-xs-12 -->

                 <div class="col-xs-12" style="margin-top:20px;">
                 	<div class="col-xs-12" style="background:#e5e5e5;font-size:14px;color:#454545;font-weight:bold;">
                 		Change Your Password
                 	</div>
                 	<div class="col-xs-12" >
                 		<br/>
                 	<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Old Password</span><input type="password"  class="form-control" name="old_password" id="old_password"  style="width:220px;display:inline-block;"></p>
                        <div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="old_password_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>
                   	
                 	<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">New Password</span><input type="password"  class="form-control" name="new_password" id="new_password"  style="width:220px;display:inline-block;"></p>
                        <div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="new_password_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>	
                   	
                 	<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Confirm Password</span><input type="password"  class="form-control" name="new_password_conf" id="new_password_conf"  style="width:220px;display:inline-block;"></p>
                        <div class="row" style="margin:0 0 0 225px">
					  
					  		<div id="new_password_conf_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>

                   	<div class="row" style="margin-left:-50px;">
                      
                      <div style="margin:0 0 0 20px;padding:0 0 0 30px;">
                        <hr>
                        <div>
						<button  class="btn btn-lg change_password" id="reply" style="width:200px;" ><strong style="font-size:15px;">Change Password</strong></button>
                        
                        
                        </div>
                      </div>
                   </div>	
                 		
                 	</div>
                 		
                   		


                 </div>
                 
               </div>
             </div><!-- container -->
           </div><!-- jumbotron -->       
         </div><!-- AD List -->
       </div> <!-- row --> 
       </div>
       <script src="<?php echo base_url();?>front_style/js/bootstrap.js"></script>
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
	<script>
		$('.reply_back').click(
			function(){
				var flag=0;
				var settings_email=$('#settings_email').val();
				var settings_name=$('#settings_name').val();
				var phone=$('#phone').val();
				var state_id=$('#state').val();
				var age=$('#age').val();
				var gender=$('#gender').val();
				var address=$('#address').val();
				var seller_type=$("input:radio[name=seller_type]:checked").val();
				
				
				if(phone.length != 10){
					flag=1;
					$('#phone_error').html("Invalid Phone Number *");	
				}else{
					$('#phone_error').html("");
				}

				if(!validateEmail($('#settings_email').val())){
					flag=1;
					$('#settings_email_error').html("Enter a valid email *");
				}else{
					$('#settings_email_error').html("");
				}

				if($('#settings_name').val() == ""){
					flag=1;
					$('#settings_name_error').html("Enter Your Name *");
					$('body').scrollTop(0);	
				}else{
					$('#settings_name_error').html("");
				}

					
				if(state_id == " "){
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
					var datas='&seller_type=' + seller_type + '&phone=' + phone + '&state_id=' + state_id + '&city_id=' + city_id + '&age='+ age + '&address=' + address + '&gender=' + gender + '&settings_name=' + settings_name + '&settings_email=' + settings_email ;
					$.ajax({
						type: "POST",    
						url: base_url + 'account/settings_edit',
						data: datas,
						success: function(msg)
						{
							
							if(msg == 0){
								alert('some error occured');
							}else if(msg == 1){
								window.location.href=base_url + 'account';
							}
						}
						
					});
				}

				function validateEmail(email) { 
					var re =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
				}
				
		}
		);
	</script>
	<script>
		$('.change_password').click(
			function(){
				var old_password=$('#old_password').val();
				var new_password=$('#new_password').val();
				var new_password_conf=$('#new_password_conf').val();
				var flag = 0;

				if($('#old_password').val() == ""){
					flag=1;
					$('#old_password_error').html("Enter Your Old Password *");	
				}else{
					$('#old_password_error').html("");
				}
				

				if($('#new_password').val() == ""){
					flag=1;
					$('#new_password_error').html("Enter Your New Password *");	
				}else{
					$('#new_password_error').html("");
				}

				if($('#new_password_conf').val() == ""){
					flag=1;
					$('#new_password_conf_error').html("Enter You New Password Again *");	
				}else{
					$('#new_password_conf_error').html("");
				}

				if(new_password !== new_password_conf){
					flag=1;
					$('#new_password_conf_error').html("Passwords Do Not Match *");	
				}else{
					$('#new_password_conf_error').html("");
				}

				if (flag == 0){
					var datas='old_password='+ old_password + '&new_password=' + new_password + '&new_password_conf=' + new_password_conf ;
						$.ajax({
							type: "POST",    
							url: base_url + 'account/change_password',
							data: datas,
							success: function(msg)
							{
								
								if(msg == 0){
									alert('Check Your Old Password');
								}else if(msg == 1){
									document.getElementById('old_password').value='';
									document.getElementById('new_password').value='';
									document.getElementById('new_password_conf').value='';
									alert('Password Changed Successfully');
								}	
							}
							
						});	
				}
			}	
		);
	</script> 
<?php
	include('include/front_footer.php');
?>