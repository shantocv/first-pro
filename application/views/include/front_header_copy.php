<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
  <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
  <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
  <!--[if gt IE 8]><!--> 
  <html class="no-js"> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title><?php  echo $main_title; ?> </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">

		<script>
	  	var base_url="<?php echo base_url(); ?>";
	  </script>
      <link rel="stylesheet" href="<?php echo base_url();?>front_style/css/boot.min.css">
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('front_style/img/favicon.ico'); ?>">
	  <!--<link rel="stylesheet" href="<?php echo base_url();?>front_style/css/main.css">-->
      <!--<link rel="stylesheet" href="<?php echo base_url();?>front_style/css/bootstrap.css">
	  <link rel="stylesheet" href="<?php echo base_url();?>front_style/css/main.css">
      <link rel="stylesheet" href="<?php echo base_url();?>front_style/css/bootstrap-responsive-ie7.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>front_style/css/sticky-footer.css">-->
      
	  
	  <script src="<?php echo base_url();?>front_style/js/html5shiv.js"></script>
      <script src="<?php echo base_url();?>front_style/js/respond.js"></script>
	  <script src="<?php echo base_url();?>front_style/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	  <script src="<?php echo base_url();?>front_style/js/jquery-1.11.0.min.js "></script>
	  <script src="<?php echo base_url()?>front_style/js/site.js"></script>
	  <script src="<?php echo base_url()?>front_style/js/ajaxfileupload.js"></script>
	  
	 <!-- <script src="<?php  echo base_url(); ?>front_style/js/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "2cc8217d-5807-4b1b-b5db-f3d038b7cedc", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script> -->
      <style>
        body {
              padding-top: 50px;
              padding-bottom: 20px;
              background-color: #fefcfd;
             }
      </style>
      
    </head>
   
    <body id="wrapper">
      <div class="navbar  navbar-fixed-top" id="nav" style="height:140px;border-bottom:0px;">
        <div class="container "style="width:100%;margin:0 auto;height:45px;">
			    <div style="max-width:1032px;margin:0 auto;">
			      <div class="col-xs-6">
			        <div class="row">
			          <div class="container pull-left"  style="width:280px;margin:10px 0 0 0;">
				       <a href="<?php echo base_url(); ?>">   <img style="width:180px;height:50px" src="<?php echo base_url();?>front_style/img/logo2.png"></a>
				          <p style="font-size:12px;color:#e9732b;padding-left:5px;">List your Business Post Free Ads</p>
		            </div>
		          </div>
		          <div class="row">
			          <div class="input-group"style="width:390px;height:34px; margin:0px 0 0px 15px;">
	      			  	<input style="background-color:#f5f5f5;width:280px;height:34px;border:0;" type="text" class="form-control" placeholder="What are you looking for?" id="global_search" value="<?php if($key == ""){}else{ echo $key; }  ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What are you looking for?'">
	      			  	<span class="input-group-btn">
	      			  	  <button id="global_search_button" class="btn btn-default" style="background-color:#166fa7;color:white;width:110px;height:35px;" type="button">&emsp;Search&emsp;</button>
		      		  	</span>
				        </div><!-- /input-group -->
		          </div>
		        </div><!-- col-xs-6-->
		        <div class="col-xs-6">
			        <div class="row">
			          <div class="container pull-right"  style="width:280px;margin:20px 0 0 0;">
				          <div class="popover-markup pull-right" style="padding:0;">
				            <?php
						  	if($this->session->userdata('logged_in')){
						  ?>
						  <a class="hov" href="<?php echo base_url(),'account'; ?>" style="font-size:14px;"><span>Hello <?php echo $this->session->userdata('username');  ?> </span></a> &nbsp;
						  	<div class="btn-group">
							  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu pull-left" role="menu" style="margin-left:-140px;">
							    <li><a href="<?php echo base_url(),'settings'; ?>" style="font-size:15;">Settings</a></li>
							    <li><a href="<?php echo base_url(),'login_page/logout' ?>" >Logout</a></li>
							    
							  </ul>
							</div>



						  <?php
							}else{
						  ?>
						  <a  href="javascript:void(0);" class="trigger1 hov" style="font-size:15;"><span style="font-size:15px;">Sign In | </span></a> <a href="javascript:void(0);"  class="trigger2 hov" style="font-size:15px;"><span style="font-size:15;">Register</span></a> 
      				      <img id="facebook"  style="cursor:pointer;width:87px;height:21px;margin:0 0 0 10px;padding:0" src=<?php echo base_url();?>front_style/img/facebook_login.png> 
						 <!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div> -->
						  <?php		
							}
						  ?>
	      			      <div class="head hide">Login</div>
		        	  	  <div class="content hide">
				              <div class="form-group">
				        	      <input id="email" type="text" class="form-control" placeholder="Email">
								  <p style="color: red;" id="email_error"></p>
				        		  <input type="password" id="password" class="form-control" placeholder="Password">
								  <p style="color: red;" id="password_error"></p>
        			  	    </div>
		        	  	    <input type="checkbox" id="remember_me"> Remember me
		        	  	    <button type="button" id="login_button" class="btn btn-default btn-block">Submit</button>
							<p style="color: red;" id="error"></p>
							<p><a  href="" id="resetpass" data-toggle="modal" data-target=".forgotpassword" style="float:left;font-size:14px;">Forgot Password ?</a></p>
							<br />
							<script>
				            	$("#resetpass").click(function()
				              {
				   						$('.trigger1').click();
			 								 });
				            </script>
							<script>
								  	$('#login_button').click(
										function(){
											var flag=0;
											var email=$('#email').val();
											var password=$('#password').val();
											if(email == ""){
												flag=1;
												$('#email_error').html('enter your email*');
											}else{
												$('#email_error').html('');
												}
											if(password == ""){
												flag=1;
												$('#password_error').html('Enter your password*');
											}else{
												$('#password_error').html('');
											}
	if(flag == 0){
									var datas='email='+ email + '&password=' + password + '&remember_me=' + $('#remember_me').is(':checked');
		$.ajax({
			type: "POST",    
			url: base_url + 'login_page/login_user',
			data: datas,
			success: function(msg)
			{
				if(msg == 0){
					$('#error').html('invalid username or password.');
				}else{
					window.location.href= 'http://' + msg + '.zeromaze.com/account';
				}
			}
					});	
											}
										}
									);
								  </script>
				            </div>
        			  	  <div class="reg hide">Registration</div>
		            		<div class="regcont hide">
				              <div class="form-group">
				        		    <input type="text" id="username" class="form-control" placeholder="Name">
							  <p style="color: red;" id="username_error"></p>
				        		    <input type="text" id="email" class="form-control" placeholder="Email">
									<p style="color: red;" id="reg_email_error"></p>
				        		    <input type="password" id="password" class="form-control" placeholder="Password">
									<p style="color: red;" id="reg_password_error"></p>
       	        		    <input type="password" id="conf_password" class="form-control" placeholder="Confirm Password">
							<p style="color: red;" id="conf_password_error"></p>				        		  </div>
				        		  
								  
								  <button type="button" id="register_button" class="btn btn-default btn-block">Submit</button>
								  <p id="error"></p>
								  <script>
								  	$('#register_button').click(
										function(){
											var flag=0;
											var username=$('#username').val();
											
											var email=$('#email').val();
											var password=$('#password').val();
											var conf_password=$('#conf_password').val();
											if(username == ""){
												$('#username_error').html('enter your username*');
											}else{
												$('#username_error').html('');
											}
											if(email == ""){
												flag=1;
												$('#reg_email_error').html('enter your email*');
											}else{
												if(!validateEmail(email)){
													flag=1;
													$('#reg_email_error').html('enter a valid email*');
												}else{
													$('#reg_email_error').html('');
												}
												
											}
											if(password == ""){
												flag=1;
												$('#reg_password_error').html('Enter your password*');
											}else{
												$('#reg_password_error').html('');
											}
											if(conf_password == ""){
												flag=1;
												$('#conf_password_error').html('Enter your password again*');
											}else{
												$('#conf_password_error').html('');
												if(password !== conf_password){
													flag=1;
													$('#conf_password_error').html('Passwords do not match*');
												}
											}
											
							if(flag == 0){
								
								var datas='email='+ email + '&password=' + password + '&username=' + username ;
								$.ajax({
									type: "POST",    
									url: base_url + 'register/add_new',
									data: datas,
									success: function(msg)
									{
										if(msg == 0){
											$('#error').html('This email id already exists.Try another one');
										}else if(msg == 1){
											window.location.href=base_url + 'account';
										}
									}
								});
							}
										}
									);
									
									function validateEmail(email) { 
				var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
								  </script>
				        	  </div>
                 </div>
		           </div>
		         </div>
		         <div class="row">
		           <div class="pull-right" style="margin:30px 15px 0 0;">
			       <a href="<?php echo base_url(),'post_ads' ?>">    <button class="btn btn-lg pull-right"  id="goldbt" style="background-color:gold;height:50px;width:180px;"><strong>Post Your Ad</strong></button> </a>
			         </div>
		         </div>
				 
				 
				 
				 



		       </div><!-- col-xs-6-->
		     </div>
	     </div>
     </div>
	 <script>
	 	$('#global_search_button').click(
			function(){
				var key=$('#global_search').val();
				if(key == ""){
					
				}else{
					key= key.split(" ");
					key=key.join("-");
					window.location.href=base_url + 'search/' + key;
				}
				
			}
		
		);
		
	 </script>
	 <script>
	 	$('#global_search').keypress(function(e) {
   			 if(e.which == 13 || e.keyCode == 13) {
        		var key=$('#global_search').val();
				if(key == ""){
					
				}else{
					key= key.split(" ");
					key=key.join("-");
					window.location.href=base_url + 'search/' + key;
				}
    		}
		});
	 </script>
	 
	 <!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1379334332334400";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
	<div id="fb-root"></div>
	 <script>
	  window.fbAsyncInit = function() {
	     FB.init({ 
	       appId:'<?php echo $this->config->item('appID'); ?>', cookie:true, 
	       status:true, xfbml:true,oauth : true 
	     });
	   };
	   (function(d){
	       var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	       if (d.getElementById(id)) {return;}
	       js = d.createElement('script'); js.id = id; js.async = true;
	       js.src = "//connect.facebook.net/en_US/all.js";
	       ref.parentNode.insertBefore(js, ref);
	    }(document));
		 $('#facebook').click(function(e) {
		    FB.login(function(response) {
			  if(response.authResponse) {
				  parent.location = base_url + 'facebook_login/fblogin';
			  }
		 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
});
   </script>