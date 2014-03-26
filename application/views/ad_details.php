<?php
	include('include/front_header.php');

?>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=475357292564828";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
        <div class="jumbotron"style="background:#f8f5f0;margin:0;padding: 0;">
          <div class="container " style="margin:0 auto;width:1000px;padding: 0;" >
            
            <div class="row" style="margin:0 auto;margin-bottom:30px;width:998px;padding: 0;">
              <div class="container " style="width:998px;margin:30px auto 0 auto;padding:0 0 0 0;border: 2px solid #e5e5e5;">
                <div class="col-xs-12"  style="background:#f9fafc;padding-right:10px;">
            		<?php
        				$cat_name=str_replace(' ', '-',$category_name->category_name);  
			            $cat_name=preg_replace('/[^A-Za-z0-9\-]/', '', $cat_name);
			            $cat_name=preg_replace('/--+/', '-', $cat_name);
                        $cat_name=strtolower($cat_name);

                        $sub_cate_name=str_replace(' ', '-',$sub_category_name->sub_category_name);  
						$sub_cate_name=preg_replace('/[^A-Za-z0-9\-]/', '', $sub_cate_name);
						$sub_cate_name=preg_replace('/--+/', '-', $sub_cate_name);
					    $sub_cate_name=strtolower($sub_cate_name);
            		?>
                  <div class="row">
                    <p style="font-size:13px;padding:10px 10px 0px 16px;margin-bottom:0px;">  &emsp;<a href="<?php echo base_url(); ?>  ">All</a> > <a href="<?php  echo base_url(),$cat_name; ?>"><?php echo $category_name->category_name; ?> </a>   > <a  href="<?php  echo base_url(),$sub_cate_name; ?>" ><?php echo $sub_category_name->sub_category_name;  ?> </a>    </p>
                       <span style="padding-left:28px;font-size:18px;font-weight:bold;color:#454545;display:block;margin-top:-6px;"><?php echo $ad_details[0]->post_title;  ?></span>
                  </div>
                  <hr id="small"> 
                  <div class="row">
                    <div class="col-xs-5" style="padding-top:10px;margin:0 0 0 30px">
                      <!--div class="container"-->
                        <!--div class="container"style="background:#d0d;width:430px;"-->
                          <div id="main_image" class="row" style="background:#e5e5e5;width:440px;" >
                          <?php
                          	if($ad_images[0]->ext == ""){
                          ?>
                          <img style="width:420px;height:300px;margin:10px;" src="<?php echo 'http://uploads.zeromaze.com/uploads/noimage.png'; ?>">
                          <?php		
                          	}else{
                          ?>
                          	<img style="width:420px;height:300px;margin:10px;" src="<?php echo 'http://uploads.zeromaze.com/uploads/',$ad_images[0]->id,'.',$ad_images[0]->ext; ?>">
                          <?php		
                          	}
                          ?>
                            
                          </div>
                          <div class="row" style="background:#e5e5e5;width:440px;margin-top:12px;">
						  	<?php  
								foreach($ad_images as $ad_image){
									if(!$ad_images[0]->ext == ""){
							?>
							<div class="col-xs-2" id="divadthumbnail">
                   <img id="adthumbnail" style="cursor: pointer;" src="<?php echo 'http://uploads.zeromaze.com/uploads/',$ad_image->id,'_thumb.',$ad_image->ext; ?>" onclick=image(<?php echo $ad_image->id,',','"',$ad_image->ext,'"';?>);  />
                              </div>
							<?php
									}		
								}
							?>
                             
                          </div>
                          <div class="row" style="width:440px;margin-top:12px;">
                            <div class="col-xs-6" style="padding-left: 0;">
                              <span class="pull-left" style="font-size:15px;font-weight:bold;color:#454545;">Ad Details</span>
                            </div>
                            <div class="col-xs-6" style="padding-right: 0;">
                              <span class="pull-right" style="font-size:15px;font-weight:bold;color:#454545;"><?php echo date('M - j - Y ', strtotime($ad_details[0]->date));  ?> </span>
                            </div>
                          </div>
                          <div class="row" style="width:440px;">
                            <hr id="big">
                          </div>
                          
                          <div class="row" style="width:440px;margin-top:12px;font-size: 15px;">
                              <?php echo $ad_details[0]->description; ?>
                          </div>
                          
                   </div> 
                    
                   <div class="col-xs-6" style="margin-left:50px;">
                     
                     <div class="row" style="margin-top: 10px;">
                       <div class="col-xs-6" style="padding-left:0;">
                         <p style="font-size:20px;background:#e5e5e5;height:40px;width:200px;padding:7px 10px;font-weight:bold;color:#454545;margin-left:12px;">Rs: <?php echo $ad_details[0]->price;  ?></p>
                         <p style="background:#e5e5e5;height:40px;width:200px;padding:0 0 0 10px;margin-left:12px;"><span style="font-size:13px;color:grey;">State : </span><span style="font-size: 15px;font-weight:bold;color:#454545;"><?php echo $state_name->state_name;  ?></span></p>
                         <p style="background:#e5e5e5;height:40px;width:200px;padding:0 0 0 10px;margin-left:12px;"><span style="font-size:13px;color:grey;">City : </span><span style="font-size: 15px;font-weight:bold;color:#454545;"><?php echo $city_name->city_name;  ?></span> </p>
                         
						<?php
					  		if($this->session->userdata('logged_in')){
								if($fav == 1){
						?>
						<span id="fav">
							<button onclick="unfavourite(<?php echo $post_id,',',$this->session->userdata('user_id');  ?>)" class="btn btn-lg grayshade"  style="background-color:#eeeeee;width:104px;height:30px;padding:0;margin-top:250px;font-size:10px;color:#3b7fd0;border:2px solid #e5e5e5;"><span style="width:15px;height:15px"><img src="<?php echo base_url(); ?>front_style/img/love.png" style="width:15px;height:15px"> Remove</span></button>
							
						</span>
						
						<?php
								}else{
						?>
						<span id="fav">
						<button onclick="favourite(<?php echo $post_id,',',$this->session->userdata('user_id');  ?>)" class="btn btn-lg grayshade"  style="background-color:#eeeeee;width:104px;height:30px;padding:0;margin-top:250px;font-size:9px;color:#3b7fd0;border:2px solid #e5e5e5;"><span style="width:15px;height:15px;"><img src="<?php echo base_url(); ?>front_style/img/love.png" style="width:15px;height:15px"> Add to Favourite</span></button>
						</span>
						<?php
								}
					  	?>
						
						<?php
						  }else{
						 ?>
						 <span id="fav">
						 <button id="not_logged" class="btn btn-lg grayshade" data-toggle="modal" data-target=".login"  style="width:104px;height:28px;padding:0;margin-top:250px;font-size:10px;border:2px solid #e5e5e5;color:#3b7fd0;	"><img src="<?php echo base_url(); ?>front_style/img/love.png" style="width:15px;height:15px;"> Add to Favourite</button>
						 </span>
						 <?php	
						  }
						 ?>
					<!--	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php  echo current_url(); ?>" target="_blank"><button class="btn btn-lg pull-right grayshade share"  style="width:104px;height:28px;padding:0;margin-top:250px;font-size:10px;border:2px solid #e5e5e5;color:#3b7fd0"><img src="<?php echo base_url(); ?>front_style/img/share1.png" style="width:15px;height:15px"> Share on Facebook </button></a>  -->
							<button class="btn btn-lg share"  style="width:59px;height:21px;padding:0;margin-top:247px;font-size:10px;"><div class="fb-share-button"  data-href="<?php  echo current_url(); ?>" data-type="button"></div></button>

                        </div>

                        <!-- Popup login start-->

											<div id="login" class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title">Login</h4>
														</div>
														<div class="modal-body" style="width:100%;min-height:200px;">
															
															<div style="width:250px;min-height:200px;float:left;margin-right:50px;">
																<div class="form-group">
																	<input type="text" id="popup_email_ad_page" class="form-control" placeholder="Email">
																</div>
																<div id="popup_email_ad_page_error" style="font-size:12px;color:red;">
																	
																</div>
																<div class="form-group">
																	<input type="password" id="popup_password_ad_page" class="form-control" placeholder="Password">
																</div>
																<div id="popup_password_ad_page_error" style="font-size:12px;color:red;">
																	
																</div>
																<div class="form-group">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" id="popup_remember_me_ad_page"><span style="font-size:12px;display:block;">Remember me</span>
																		</label>
																	</div>
																</div>
															</div>
															
															<div style="width:250px;min-height:130px;float:left;padding:20px 0 0 60px;border-left:1px solid #e5e5e5;">
																<img id="facebook_popup"  style="cursor:pointer;width:87px;height:21px;margin:0 0 0 10px;padding:0" src=<?php echo base_url();?>front_style/img/facebook_login.png>
															</div>
															
														</div>
														<div class="modal-footer">
															<a href="#" id="forgotpass" data-toggle="modal" data-target=".forgotpassword" style="float:left;font-size:14px;">Forgot Password</a>
															<button type="button"  id="popup_button_close" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="button" id="popup_login_button" class="btn btn-primary">Login</button>
														</div>
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
												 $('#facebook_popup').click(function(e) {
												 	$('#popup_button_close').click();
												    FB.login(function(response) {
													  if(response.authResponse) {
														  parent.location = base_url + 'facebook_login/fblogin';
													  }
												 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
											  });
										   </script>
													</div><!-- /.modal-content -->

													<!-- login script starts -->

													<script>
								  	$('#popup_login_button').click(
										function(){
											var flag=0;
											var popup_email_ad_page=$('#popup_email_ad_page').val();
											var popup_password_ad_page=$('#popup_password_ad_page').val();
											if(popup_email_ad_page == ""){
												flag=1;
												$('#popup_email_ad_page_error').html('enter your email*');
											}else{
												$('#popup_email_ad_page_error').html('');
												}
											if(popup_password_ad_page == ""){
												flag=1;
												$('#popup_password_ad_page_error').html('Enter your password*');
											}else{
												$('#popup_password_ad_page_error').html('');
											}
	if(flag == 0){
									var datas='email='+ popup_email_ad_page + '&password=' + popup_password_ad_page + '&remember_me=' + $('#popup_remember_me_ad_page').is(':checked');
		$.ajax({
			type: "POST",    
			url: base_url + 'login_page/login_user',
			data: datas,
			success: function(msg)
			{
				if(msg == 0){
					$('#popup_password_ad_page_error').html('invalid username or password.');
				}else if(msg == 1){
					window.location.href=base_url + 'account';
				}
			}
					});	
											}
										}
									);
								  </script>


												</div>
											</div>


<!-- popup end-->


                        <div class="col-xs-6" style="background:#a5ddfe;padding-left:25px;min-height:560px;padding-left: 0;padding-right:0px;">
                          <div class="row"style="width:250px;padding:0;margin:0;">
                            <p style="font-size:16px;margin:0;padding:5px 0 10px 10px;color:#454545;"><strong>SELLER INFO</strong></p>
                            <hr id="small">
                         </div>
                         <div class="row" >
                            <p style="font-size:18px;margin:0;padding:15px 0 10px 25px;color:#454545;"><strong><?php echo $ad_details[0]->posted_by;  ?></strong></p>
                            <p style="font-size:13px;margin:0;padding:0 0 0 25px;color:grey;"><?php echo $city_name->city_name;  ?>,<?php echo $state_name->state_name;  ?></p>
                            <p style="font-size:13px;padding:0 0 0 25px;color:grey;">India</p> 
                            <p style="padding:0 0 0 25px;color:#454545;"><span class="glyphicon glyphicon-phone-alt" style="width:20px;height:20px;color:#454545;" ></span> <strong><?php echo $ad_details[0]->phone_number;  ?></strong></p>
                         </div>
                         <div class="row"style="padding-left: 25px;">
                            <p style="font-size:13px;margin:0;padding:0;color:grey;">Message</p>
                            <textarea style="width:228px;height:128px;font-size:14px;border-radius:5px;padding-left:4px;" id="message" name="message"></textarea>
							<p style="font-size:13px;margin:0;padding:0 ;color:red;" id="message_error"></p>
							
                            <p style="font-size:13px;margin:0;padding:0;color:grey;">Name</p>
                            <input style="width:228px;height:30px;font-size:14px;border-radius:5px;padding-left:4px;" type="text" id="from_name" name="from_name">
							<p style="font-size:13px;margin:0;padding:0;color:red;" id="name_error"></p>
							
                            <p style="font-size:13px;margin:0;padding:0;color:grey;">Email</p>
                            <input style="width:228px;height:30px;font-size:14px;border-radius:5px;padding-left:4px;" type="text" id="from_email" name="from_email">
							<p style="font-size:13px;margin:0;padding:0;color:red;" id="from_email_error"></p>
							
                            <p style="font-size:13px;margin:0;padding:0;color:grey;">Phone</p>
                            <input style="width:228px;height:30px;font-size:14px;border-radius:5px;padding-left:4px;" type="text" id="phone" name="phone" onkeypress='validate(event)'>
							<p style="font-size:13px;margin:0;padding:0;color:red;" id="phone_error"></p>
                            
                         </div>
                         <div class="row">
                           
                           <button class="btn" id="goldbt1" style="background-color:#e4c326;height:30px;width:150px;padding-top:2px;font-size:15px;margin:0 0 10px 60px"><strong>Send Email</strong></button>
                         </div> 
						 <div class="row" id="success" style="padding-left: 56px;">
                         
                         </div> 
                         <div class="row" id="success_img" style="padding-left: 114px;">
                         
                         </div>                      
                      </div>
                   </div> 
                 </div>
               </div>  
             </div>
           </div>
         </div> <!-- row -->
         
         <div class="row" style="width:998px;margin:0 auto;">
            <div class="container " style="width:998px;margin:0 auto;padding: 0;">
              
             
			 
			  <div class="col-xs-6" style="width:690px;background:#f9fafc; margin:0;border: 2px solid #e5e5e5;padding-bottom: 15px;">
               
			   <div class="row" id="aacontainer" style="background:#fff; padding:10px;">
                  <div class="col-xs-12" >
                    <img style="width:100%;height:90px" src="<?php echo base_url(); ?>front_style/img/ad1.png"class="img-responsive" alt="Responsive image">
                  </div><!-- /.col-xs-12 -->
                </div>
				
				<div id="pagination">
					<?php echo $links; ?>
				</div>
				<div class="col-xs-12" id="aalistmain" >
				<p style="font-size:15px;font-weight:bold;margin-top:10px;margin-left:-6px;">Similar Ads</p>
                 
				<?php
        foreach($ads as $ad){
        ?>
                <div class="col-sm-12" style="height:1px;background:#e5e5e5;"></div> 
                <div class="col-sm-12" id="aacontainer" style="background:#edebec;padding-top:4px;padding-bottom:4px;margin-bottom:10px;margin-top:10px;">
        <?php 
          
             $post_name=str_replace(' ', '-',$ad->post_title);  
              $post_name=preg_replace('/[^A-Za-z0-9\-]/', '', $post_name);
              $post_name=preg_replace('/--+/', '-', $post_name);
              $post_name=preg_replace( '/_[^_]*$/', '', $post_name );
               $post_name=strtolower($post_name);
        ?>
        <a href="<?php echo base_url(),$post_name,'/',$ad->post_id;?> ">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:140px;height:90px;margin-left: -12px;margin-top:6px;" src="
            <?php 
              if($ad->ext == ""){
                echo 'http://uploads.zeromaze.com/uploads/def_thumb.png';
              }else{
                echo 'http://uploads.zeromaze.com/uploads/',$ad->id,'_thumb.',$ad->ext;
              }
            
              ?>" class="img-responsive" alt="Responsive image">
                      </div>
            
               <div class="col-sm-9" style="padding-left:0px;">
                        <div class="col-sm-12" style="margin-left:0px;padding-left:0px;padding-right:0px;">
                          <div class="col-sm-9" id="adtitle">
                           
                            <?php 
                              if(strlen($ad->post_title) > 33){
                                 $str =  substr($ad->post_title, 0, 33).'...';
                                 $str = strip_tags($str);
                                 $str = strtolower($str);
                                 echo $str;  
                              }else{
                                echo $ad->post_title;
                              }
                              
                            ?>
  
                          
                          </div>
                          <div class="col-sm-3" style="font-size:18px;color:#166fa7;padding-right:0px;padding-left:0px;"><div class="pull-right" style="font-family:Arial,Helvetica,sans-serif;">&#8377; <?php echo $ad->price;  ?></div> </div> 
                        </div>
                        <div class="col-sm-12" style="margin-left:0px;color: grey;font-size: 12px;border-bottom:1px solid #aaaaaa;padding-left:0px;padding-right:0px;">
                          <?php 
                          if(strlen($ad->description) > 100){
                             $str =  substr($ad->description, 0, 100).'...';
                             $str = strip_tags($str);
                             $str = strtolower($str);
                             echo $str;  
                          }else{
                            echo $ad->description;
                          }
                          
                          ?>

                        </div>
                    
                        <div class="col-sm-12" style="margin-left:0px;font-size:12px;color:grey;padding-left:0px;padding-right:0px;">
                          <div class="col-sm-9" style="padding-left:0px;"> 
                          		<?php 
		                            echo $category_name->category_name ; 
		                            if($this->session->userdata('city') !== 'yuplee' ){
		                                $session_city= $this->session->userdata('city');
		                                $session_city = ucfirst($session_city);
		                                echo " | in $session_city";
		                            }
		                        ?>
                          </div>
                          <?php
                            $old_date=new DateTime($ad->date);
                            $diff_time = $current_date->diff($old_date);
                            if($diff_time ->format('%a') >= $ad->expire ){
                            ?> 
                            <div class="col-sm-3 pull-right" style="font-size:12px;margin:0;color:red;padding-left:0px;padding-right:0px;"><div class="pull-right"><?php echo 'Ad expired' ;?></div></div>
                            <?php
                              }else{
                            ?>
                            <div class="col-sm-3 pull-right" style="font-size:12px;margin:0;color:grey;padding-left:0px;padding-right:0px;"><div class="pull-right"> <?php echo date('M - j - Y ', strtotime($ad->date));  ?></div></div>
                            <?php    
                              }
                          
                           ?>
                          
                        </div>
                </div>
            </a>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
        <?php 
        }
        ?>

                
               </div>
                 
             </div>     
           </div>
         </div> <!-- row -->
            
        </div> <!-- container -->
    </div>
    
    
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="<?php echo base_url(); ?>front_style/js/bootstrap.js"></script>
    <script type="text/javascript">
           $( document ).ready(function() {
                    var t1;
                  var t2;
                  t1 = 0;
                  t2 = 0;
				  console.log('test');
				         $('.trigger1').popover({
				                 'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t2==1){
                          //hide popover
                          $('.trigger2').click();
                          t2=0;
                          }
                          t1=1;
                          return $(this).parent().find('.head').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.content').html();
                      }
                      
                  });
                  $('.trigger2').popover({
				                   'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t1==1){
                          //hide popover
                          $('.trigger1').click();
                          t1=0;
                          }
                          t2=1;
                          return $(this).parent().find('.reg').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.regcont').html();
                      }
                  });
                  });
  </script>
  <script>
  	function image(id,ext){
		var datas='image_id='+ id + '&ext=' + ext;
		$.ajax({
				type: "POST",    
				url: base_url + 'home/change_image',
				data: datas,
				success: function(msg)
				{
					$('#main_image').html(msg);
				}
			});
	}
  </script>
  <script>
  	function favourite(post_id,user_id){
		datas='post_id='+ post_id + '&user_id=' + user_id;
				$.ajax({
					type: "POST",    
					url: base_url + 'home/adfav',
					data: datas,
					success: function(msg)
					{
						$('#fav').html(msg);
					}
				});
		
	}
  </script>
  <script>
  	function unfavourite(post_id,user_id){
		datas='post_id='+ post_id + '&user_id=' + user_id;
				$.ajax({
					type: "POST",    
					url: base_url + 'home/unfav',
					data: datas,
					success: function(msg)
					{
						
						$('#fav').html(msg);
					}
				});
		
	}
  </script>
  <script>
 	$('#goldbt1').click(
		function(){
			
			var flag=0;
			var message=$('#message').val();
			var from_name=$('#from_name').val();
			var from_email=$('#from_email').val();
			var phone=$('#phone').val();
			var to_email='<?php echo $ad_details[0]->email;  ?>';
			var title='<?php echo $ad_details[0]->post_title;  ?>';
		
			if(message == ""){
				flag=1;
				$('#message_error').html('Enter Your Meassage *');
			}else{
				$('#message_error').html('');	
			}
			
			if(from_name == ""){
				flag=1;
				$('#name_error').html('Enter Your Name *');
			}else{
				$('#name_error').html('');
			}
			
			if(!validateEmail(from_email)){
				flag=1;
				$('#from_email_error').html('Enter Your Email *');
			}else{
				
				$('#from_email_error').html('');	
			}
			if(phone.length !== 10){
				flag=1;
				$('#phone_error').html('Enter a Valid Phone Number *');
			}else{
				$('#phone_error').html('');
			}
			
			if(flag == 0){
				$('#success_img').html('<img src='+base_url+'front_style/img/load1.gif>');
				var datas='message='+ message + '&from_name='+ from_name + '&from_email='+ from_email + '&phone='+ phone + '&to_email=' + to_email + '&title=' + title ;
				$.ajax({
					type: "POST",    
					url: base_url + 'home/send_message',
					data: datas,
					success: function(msg)
					{
						
						if(msg == 0){
							alert('some error occured');
						}else if(msg == 1){
							$('#success_img').html('');
							$('#success').html('Sent Succesfully');
							document.getElementById('message').value='';
							document.getElementById('from_name').value='';
							document.getElementById('from_email').value='';
							document.getElementById('phone').value='';
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
  <script type="text/javascript">
  	$('#forgotpass').click(
  		function(){
  			$('#popup_button_close').click();
  		}
  	);
  </script>
  	
 <?php
	include('include/front_footer.php');
?>
