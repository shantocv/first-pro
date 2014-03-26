<div id="forgotpassword" class="modal fade forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title">Forgot Password ?</h4>
														</div>
														<div class="modal-body" style="width:100%;height:100px;">
															<p style="font-size:12px;">Please enter the email address you used to register on Yuplee. We will email you your password.</p>
															<div style="width:250px;height:100px;float:left;margin-right:50px;">
																
																<div class="form-group">
																	<input type="text" id="popup_email" name="popup_email" class="form-control" placeholder="Email">
																</div>
																<div style="margin-bottom: 5px;color: red;" id="popup_email_error">
																
															</div>
															</div>
															
															
															
														</div>
														<div class="modal-footer">
															<button type="button" id="close_button" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="button" id="reset_button" class="btn btn-primary">Reset</button>
														</div>
													</div><!-- /.modal-content -->
												</div>
											</div>




<div id="footer" style="height:215px;margin-top: 20px;">
       <div class="container">
         <center style="margin-top:60px"><p class="text-muted"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></p></center>
      	 <center><a href="#"><img src="<?php echo base_url();?>front_style/img/fb.png" style="width:30px;height:30px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/tw1.png" style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/g+1.png" style="width:20px;height:20px"></a></center>	
      <!--   <center> <span class='st_facebook_large' displayText='Facebook'></span>
		<span class='st_twitter_large' displayText='Tweet'></span>
		<span class='st_linkedin_large' displayText='LinkedIn'></span>
		<span class='st_googleplus_large' displayText='Google +'></span>
		<span class='st_fblike_large' displayText='Facebook Like'></span> </center> -->
       </div>
     </div>
	 <script>
	 	$('#reset_button').click(
			function(){
				var flag=0;
				var popup_email=$('#popup_email').val();
				if(popup_email == ""){
					flag=1;
					$('#popup_email_error').html('enter your email*');
				}else{
					if(!validateEmail(popup_email)){
						flag=1;
						$('#popup_email_error').html('enter a valid email*');
					}else{
						$('#popup_email_error').html('');
					}
					
				}
				
				
				if(flag == 0){
					datas='email='+ popup_email;
					$.ajax({
						type: "POST",    
						url: base_url + 'login_page/forgotpass',
						data: datas,
						success: function(msg)
						{
							if(msg == 1){
								$('#popup_email_error').html('Your new password has sent to your email ID');
								document.getElementById('popup_email').value='';
							}else{
								$('#popup_email_error').html('This email doesn\'t exists');
							}
						}
					});
				}
				
			}
			
		);
	 </script>
	
    	
 </body>
</html>