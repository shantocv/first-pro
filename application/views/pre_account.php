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
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Mobile Number*</span><input type="text" class="form-control" name="phone" id="phone" onkeypress='validate(event)' style="width:220px;display:inline-block;"></p>
						
						<div class="row" style="margin:0 0 0 230px">
					  
					  		<div id="phone_error" style="color:red;font-size:14px;">
			
							</div>
                   		</div>
						
                        
						 <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">State*</span><select style="width:220px;display:inline-block;"name="state" id="state" class="form-control">
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
							
						 
						<div class="row" style="margin:0 0 0 230px">
							<div id="location" style="color:red;font-size: 14px;">
			
							</div>
						</div>

						<div class="row" style="margin:0 0 0 230px">
							<div id="location" style="color:red;font-size: 14px;">
			
							</div>
						</div>

						<div id="neighbour_hood" style="margin-top:30px;">
							
						</div>
						<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Are you a *</span>
<label style="font-weight:normal;"> <input type="radio" checked="true" style="cursor:pointer;"  name="seller_type"  value="individual"><span style="cursor:pointer;"> Individual</span></label><label style="font-weight:normal;"><input type="radio" name="seller_type" value="buisiness_man" style="margin:0 0 0 15px;cursor:pointer;"><span style="cursor:pointer;"> Business</span></label></p>
                        
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Gender</span><select name="gender" id="gender" class="form-control" style="width:100px;display:inline-block;"><option value="m">Male</option><option value="f">Female</option></select></p>
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Age</span><input type="text" name="age" id="age" class="form-control" onkeypress='validate(event)' style="width:65px;display:inline-block;"></p>
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Address</span><textarea name="address" class="form-control" id="address" style="width:295px;height:95px;display:inline-block;"></textarea></p>
                        </div>
                      </div>
                   </div>
                   
                   <div class="row">
                      
                      <div style="margin:0 0 0 20px;padding:0 0 0 30px;">
                        <hr>
                        <div>
						<button  class="btn btn-lg" id="reply" ><strong style="font-size:15px;">Update</strong></button>
                        
                        
                        </div>
                      </div>
                   </div>
                 </div><!-- /.col-xs-12 -->
                 
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
		$('#reply').click(
			function(){
				var flag=0;
				var phone=$('#phone').val();
				var state_id=$('#state').val();
				var age=$('#age').val();
				var gender=$('#gender').val();
				var address=$('#address').val();
				var seller_type=$("input:radio[name=seller_type]:checked").val();
				
				
				if(phone.length != 10){
					flag=1;
					$('#phone_error').html("Invalid Phone Number *");
					$('body').scrollTop(0);	
				}else{
					$('#phone_error').html("");
				}
					
				if(state_id == " "){
						flag=1;
						$('#location').html("Select Your state *");
						$('body').scrollTop(0);
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
					var datas='&seller_type=' + seller_type + '&phone=' + phone + '&state_id=' + state_id + '&city_id=' + city_id + '&age='+ age + '&address=' + address + '&gender=' + gender;
					$.ajax({
						type: "POST",    
						url: base_url + 'account/update',
						data: datas,
						success: function(msg)
						{
							
							if(msg == 0){
								alert('some error occured');
							}else{
								window.location.href= 'http://' + msg  +  '.zeromaze.com/account';
							}
						}
						
					});
				}
		}
		);
	</script>
	<script>
		function hood(city_id){
			$.post(base_url + "upload/select_hood",{'city':city_id},function(data){
				$('#location').html("");	
				$('#neighbour_hood').html(data);
			});
		}
	</script>
<?php
	include('include/front_footer.php');
?>