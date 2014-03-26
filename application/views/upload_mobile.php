<?php
	if($this->session->userdata('post_id') !== 0 ){
		$this->session->unset_userdata('post_id');
	}

?>
<?php
	include('include/front_header.php');

?>

<script src="<?php echo base_url();?>front_style/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({selector:'textarea',menubar:false,
    statusbar: false,});
</script>	 
     <div class="container " id="wrapper" style="margin:0 auto;margin-top:115px;">
       
       <div class="row" style="width:1024px;padding:0;margin:0 auto;margin-top:20px;" >
      
          
        
        
         <!-- AD List -->
         <div class="col-md-12" id="adlist" style="width:1034px;background:#fafbfd;margin-bottom:20px;">
             <div class="container" style="width:1004px;min-height:730px;padding:0;">
               <div class="row">
                 <div class="col-md-12" style="background:#fafbfd;padding-bottom:10px;">
                   <div class="row" style="height:45px;background:#166fa7;">
                     <p style="font-size:15px;font-weight:bold;color:white;margin: 10px 0 10px 20px"> Post Ad Details</p>  
                   </div>
                   
				   <div class="row" style="margin:20px 0 0 80px">
				   <input type="hidden" name="category_id" id="category_id" value="<?php echo $sub_category->category_id  ?>"/>
					
				   </div>
				   <div class="row" style="margin:20px 0 0 80px">
				   <input  type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo $sub_category_id  ?>"/>
				   </div>
				   
				   <div class="row" style="margin:20px 0 0 80px">
                      <p style="width:715px;font-size:15px;"> <span style="display:inline-block;width:230px;">Chosen category : </span><?php echo $category->category_name,' > ', $sub_category->sub_category_name ; ?></p>
                   </div> 
                   <div class="row" style="margin:20px 0 0 80px">
                      <p style="width:715px;font-size:15px;"> <span style="display:inline-block;width:230px;">Ad title</span><input type="text" id="title" style="width:420px;"></p>
                   </div>
				   <div class="row" style="margin:20px 0 0 310px">
					  
					  		<div id="title_error" style="color:red;">
			
							</div>
                   </div>
				   
                   <div class="row" style="margin:0 0 0 80px">
                      <p style="width:230px;font-size:15px;"> 
                        <span style="display:inline-block;width:230px;">Photos:</span>
                      </p>
                      <div class="col-xs-9" style="width:420px;min-height:90px;background:white;margin:0 0 10px 230px;border:1px solid #ccc;border-radius:5px;">
                        <div class="row" >
                          <button class="btn btn-lg"style="background-color:#1b6c9b;color:white;height:40px;width:190px;margin:20px 0 10px 35px;padding:5px;" id="photo">
                            <strong>Select Photo</strong>
                          </button>
						  
						  <input type="file" name="userfile" id="userfile" style="display: none;" />
                        </div>
						
                        <div class="row" id="thumb">
                          
                        </div>
                     </div>
                   </div>
				   
				   <div class="row" style="margin:20px 0 0 80px">
                      <p style="width:715px;font-size:15px;"> <span style="display:inline-block;width:230px;">Chosen category : </span><select name="type" id="type">
						<option value=" ">Select Type</option>
						<?php
								foreach($types as $type){
									echo '<option value=',$type->type_id,'>',$type->type_name,'</option>';
								}
							?>
					</select></p>
                   </div>
				   <div id="sub_type" class="row" style="margin:20px 0 0 80px">
						
					</div>
							
						 
						
				   
				    <!--<?php 
				   	if(!empty($types)){
					?>
					<div class="row" style="margin:20px 0 0 80px">
                      <p style="width:715px;font-size:15px;"> <span style="display:inline-block;width:230px;">Chosen category : </span><select name="type" id="type">
						<option value="">Select Type</option>
						<?php
								foreach($types as $type){
									echo '<option value=',$type->type_id,'>',$type->type_name,'</option>';
								}
							?>
					</select></p>
                   </div> 
					<?php		
					}else{
					?>
					<select name="type" id="type" style="display: none;">
						<option value="">Select Type</option>
					</select>
					<?php	
					}
				   ?>-->
				  
				   
				   
                   
                   <div class="row" style="margin:0 0 0 80px">
                      <div style="width:225px;font-size:15px;"> 
                        <span style="display:inline-block;width:230px;">Discription:</span>
                      </div>
                      <div  style="width:420px;height:200px;margin:0 0 0 230px;padding:0">
                          <textarea id="description"></textarea>
                      </div>
                   </div>
				   <div class="row" style="margin:0 0 30px 310px">
					  
					  		<div id="description_error" style="color:red;">
			
							</div>
                   </div>
				   
                   <div class="row" style="margin:0 0 0 80px">
                      <p style="width:715px;font-size:15px;"> <span style="display:inline-block;width:230px;">Price:</span><input type="text" style="padding-left: 2px;" name="price" id="price" onkeypress='validate(event)' placeholder="your price" style="width:230px;"> .00 Rupees</p>
                   </div>
                   <div class="row" style="margin:0 0 0 60px">
                      <p style="font-size:15px;font-weight:bold;color:#4698ca;margin: 10px 0 10px 20px"> Personal Details</p>  
                      <div style="width:575px;margin:0 0 0 26px;">
                        <div>
                       
					    <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Email</span><input type="text" name="contact_email" id="contact_email" style="width:325px;"></p>
						
						<div class="row" style="margin:0 0 30px 225px">
					  
					  		<div id="contact_email_error"style="color:red;">
			
							</div>
                   		</div>
						
						
						
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Full Name*(1-30 characters)</span><input type="text" name="contact_name"  id="contact_name" style="width:325px;"></p>
						
						<div class="row" style="margin:0 0 30px 225px">
					  
					  		<div id="contact_name_error"style="color:red;">
			
							</div>
                   		</div>
						
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Mobile Number*</span><input type="text" name="phone" id="phone" onkeypress='validate(event)' style="width:220px;"></p>
						
						<div class="row" style="margin:0 0 30px 225px">
					  
					  		<div id="phone_error" style="color:red;">
			
							</div>
                   		</div>
						
                        <p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">State</span>
					<select style="width:220px;"name="state" id="state">
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
							
						 
						<div class="row" style="margin:0 0 30px 225px">
							<div id="location" style="color:red;">
			
							</div>
						</div>
						 
						 
<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Are you a *</span>
<input type="radio" name="seller_type" value="individual">Individual<input type="radio" name="seller_type" value="buisiness_man" style="margin:0 0 0 15px">Business</p>	

<span style="display:inline-block;width:230px;margin-top:20px"></span>						
<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:230px;">Enter The Sum</span>
<form method="post" style="margin-left: 230px;margin-top: -30px;">
        <input type="text" name="secure" id="secure" placeholder="what's the result ?" class="form-control" style="width: 150px;" />
        <span class="explain">click on the image to reload it</span>
		<br />
		<br />
        <img src="<?php echo base_url(); ?>captcha/image.php" alt="Click to reload image" title="Click to reload image" id="captcha" onclick="javascript:reloadCaptcha()" />
    </form></p>

<div class="row" style="margin:0 0 30px 230px">
					  
					  		<div id="sum_error" style="color:red;">
			
							</div>
							<div id="wait" style="color:red;">
			
							</div>
                   		</div>					 
                        
<span style="display:inline-block;width:225px;margin-top:50px"></span>
                        <button id="post" class="btn btn-lg" style="background-color:#e4c326;width:85px;height:30px;padding:0"><strong style="font-size:15px;">Post</strong></button>
                       
                        </div>
                      </div>
                   </div>
                   
                 </div><!-- /.col-sm-12 -->
               </div>
             </div><!-- container -->   
         </div><!-- AD List -->
       </div> <!-- row --> 
     </div> <!-- container -->
    
<div id="footer" style="height:215px;">
       <div class="container">
         <center style="margin-top:60px"><p class="text-muted"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></p></center>
         <center><a href="#"><img src="<?php echo base_url();?>front_style/img/fb.png" style="width:30px;height:30px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/tw.png" style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/g+.jpg" style="width:20px;height:20px">&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/like.jpg" style="width:35px;height:20px"></a></center>
       </div>
     </div>   
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>front_style/js/bootstrap.js"></script>
	<script>
		var base_url="<?php echo base_url(); ?>";
	</script>
	<script>
		$("#photo").click(function() {
    		$("input[id='userfile']").click();
		});
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
		function remove_photo(id){
			var datas='id='+ id  ;
			$.ajax({
					type: "POST",    
					url: base_url + 'upload/remove',
					data: datas,
					success: function(msg)
					{
							
					}
					
				});
			$('#id' + id).remove();
		}
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
			var description = tinyMCE.activeEditor.getContent();
			var price=$('#price').val();
			var seller_type=$("input:radio[name=seller_type]:checked").val();
			var contact_name=$('#contact_name').val();
			var contact_email=$('#contact_email').val();
			var phone=$('#phone').val();
			var state_id=$('#state').val();
			var type_id=$('#type').val();
			var sub_type_id=0;
			var answer=$('#secure').val();
			
			
			if(title == ""){
				flag=1;
				$('#title_error').html("Enter Your title *");
				$('body').scrollTop(0);
			}else{
				$('#title_error').html("");
			}
			
			if(description == ""){
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
			
			
			
			if($('#phone').val().length != 10){
				flag=1;
				$('#phone_error').html("Invalid Phone Number *");	
			}else{
				$('#phone_error').html("");
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
			
			if(type_id !== " "){
				sub_type_id=$('#sub_type_name').val();
				
			}
			
			if(flag == 0){
				da='answer='+ answer;
				$.ajax({
					type: "POST",    
					url: base_url + 'captcha/captcha.php',
					data: da,
					success: function(msg)
					{
						if(msg == 0){
							$('#sum_error').html('Incorrect Sum *');
							document.getElementById('captcha').src = document.getElementById('captcha').src+ '?' +new Date();
							
						}else{
							/*var wait='<img src='+base_url+'front_style/img/wait.gif>';*/
							$('#wait').html('<img src='+base_url+'front_style/img/wait.gif>');
							var datas='category_id='+ category_id + '&sub_category_id=' + sub_category_id + '&title=' + title + '&description=' + description + '&price=' + price + '&seller_type=' + seller_type + '&contact_name=' + contact_name + '&contact_email=' + contact_email + '&phone=' + phone + '&state_id=' + state_id + '&city_id=' + city_id + '&sub_type_id='   + sub_type_id + '&type_id=' + type_id ;
				
				$.ajax({
					type: "POST",    
					url: base_url + 'upload/post',
					data: datas,
					success: function(msg)
					{
						if(msg == 0){
							alert('some error occured');
						}else if(msg == 1){
							window.location.href=base_url ;
						}
					}
					
				});
							
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
	$('#type').change(
			function(){
				var type_id=$('#type').val();
				var datas='type_id='+ type_id ;
				
				$.ajax({
					type: "POST",    
					url: base_url + 'upload/select_sub_type',
					data: datas,
					success: function(msg)
					{
							
						$('#sub_type').html(msg);
					}
					
				});
				
			}
		
	);
</script>

<script type="text/javascript">
           $( document ).ready(function() {
                  var t1;
                  var t2;
                  t1 = 0;
                  t2 = 0;
				  $('.trigger1').click(
				  	function(){
						if(t1 == 1){
							t1=0;
						}
					}
				  );
				  
				  $('.trigger2').click(
				  	function(){
						if(t2 == 1){
							t2=0;
						}
					}
				  );
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
