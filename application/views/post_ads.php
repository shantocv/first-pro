<?php
	include('include/front_header.php');

?>
     <div class="container " id="wrapper" style="margin:0 auto;margin-top:10px;">
      <div class="rows" style="margin-top:24px;padding-top:1px;padding-bottom:1px;">
        <div class="box" style="background-color:#f9fafc;width:1000px;margin:0 auto;margin-bottom:20px;">
          <!--<div class="box-header" data-original-title="" style="background-color:#f9fafc;margin:0 auto;">
            <h5 style="color:#000;font-size:18px;font-weight:bold;">&emsp;Browse by Category</h5>
          </div>-->
          <!-- <div class="box-content"> -->
          <div class="sidenav">
            <ul class="nav nav-stacked col-xs-3" id="navul1" >
            <li class="liborder2 antihover" style="border-bottom:2px solid #e5e5e5;"><a href="javascript:void(0);" ><span style="color:#454545;font-size:17px;font-weight:bold;">Choose a Category</span></a></li>
             <li class="liborder2 antihover" id="option01"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/mobilephones.png">&emsp;Mobile Phones</span></a>
              </li><li class="liborder2 antihover" id="option02"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/automobiles.png">&emsp;Automobiles</span></a>
              </li><li class="liborder2 antihover" id="option03"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/electronics.png"></i>&emsp;Electronics</span></a>
              </li><li class="liborder2 antihover" id="option04"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/jobs.png">&emsp;Jobs</span></a>
              </li><li class="liborder2 antihover" id="option05"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/classes1.png">&emsp;Classes</span></a>
              </li><li class="liborder2 antihover" id="option06"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/realestate.png">&emsp;Real Estate</span></a>
              </li><li class="liborder2 antihover" id="option07"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/lifestyle1.png">&emsp;Home & Lifestyle</span></a>
              </li><li class="liborder2 antihover" id="option00"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/personal.png">&emsp;Events</span></a>
			  </li><li class="liborder2 antihover" id="option08"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/school.png">&emsp;Collage & Schools</span></a>
			  </li><li class="liborder2 antihover" id="option09"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/services.png">&emsp;Services</span></a>
			  </li><li class="liborder2 antihover" id="option10"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/tourist.png">&emsp;Tourist Places</span></a>
			  </li><li class="liborder2 antihover" id="option11"><a style="padding:6px 15px;" href="javascript:void(0);" ><span style="color:black;font-size:16px;font-weight:bold;"><img class="circleborder" src="<?php echo base_url(); ?>front_style/img/list.png">&emsp;List Business</span></a>
			  </li>
            </ul>
          </div>
          <!-- </div> -->
          
      
          <div class="col-xs-7 antihover" id="navitem01" style="background:#f9fafc">
            <div class="col-xs-10" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
             
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($mobile_phones as $mobile_phone){
						   $title=$mobile_phone->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$mobile_phone->sub_category_id; ?>  "><?php echo $mobile_phone->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>
        
          <div class="col-xs-7 antihover" id="navitem02" style="background:#f9fafc">
            <div class="col-xs-10" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
             
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <ul class="nav nav-stacked">
			  <?php
						foreach($automobiles as $automobile){
						   $title=$automobile->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$automobile->sub_category_id; ?>  "><?php echo $automobile->sub_category_name; ?></a></li>
					<?php
						}
					?>

              </ul>
                
              </ul>
            </div>
          </div>
          
          <div class="col-xs-7 antihover" id="navitem03" style="background:#f9fafc">
            <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($electronics as $electronic){
						   $title=$electronic->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$electronic->sub_category_id; ?>  "><?php echo $electronic->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>          
          
          <div class="col-xs-7 antihover" id="navitem04" style="background:#f9fafc">
            <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($jobs as $job){
						   $title=$job->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$job->sub_category_id; ?>  "><?php echo $job->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>  
          
          <div class="col-xs-7 antihover" id="navitem05" style="background:#f9fafc">
            <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($classes as $class){
						   $title=$class->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$class->sub_category_id; ?>  "><?php echo $class->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>   
          
          <div class="col-xs-7 antihover" id="navitem06" style="background:#f9fafc">
            <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($real_estates as $real_estate){
						   $title=$real_estate->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$real_estate->sub_category_id; ?>  "><?php echo $real_estate->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>    
          
          <div class="col-xs-7 antihover" id="navitem07" style="background:#f9fafc">
            <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
               
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($life_styles as $life_style){
						   $title=$life_style->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$life_style->sub_category_id; ?>  "><?php echo $life_style->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div>                               
          <div class="col-xs-7 antihover" id="navitem00" style="background:#f9fafc">
           <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
               
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
				<?php
						foreach($events as $event){
						   $title=$event->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$event->sub_category_id; ?>  "><?php echo $event->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
                
              </ul>
            </div>
          </div> 
          <div class="col-xs-7 antihover" id="navitem08" style="background:#f9fafc">
           <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
               
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($schools as $school){
						   $title=$school->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$school->sub_category_id; ?>  "><?php echo $school->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div> 
          <div class="col-xs-7 antihover" id="navitem09" style="background:#f9fafc">
           <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
               
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($services as $service){
						   $title=$service->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$service->sub_category_id; ?>  "><?php echo $service->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div> 
          <div class="col-xs-7 antihover" id="navitem10" style="background:#f9fafc">
           <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($tours as $tour){
						   $title=$tour->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$tour->sub_category_id; ?>  "><?php echo $tour->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div> 
          <div class="col-xs-7 antihover" id="navitem11" style="background:#f9fafc">
           <div class="col-xs-12" style="margin:10px 0 0 0">
              <ul class="nav nav-stacked">
                
                <a id="nounderline" style="color:#454545;font-size:17px;padding-bottom:10px;font-weight:bold;">Choose a Sub Category</a>
                <hr id="big">
                <?php
						foreach($lists as $list){
						   $title=$list->sub_category_name;
						   $title=strtolower($title);
						   $title=explode(" ",$title);
						   $title=implode("_",$title);
					?>
					<li><a id="nomargin" href=" <?php echo base_url(),'upload?id=',$list->sub_category_id; ?>  "><?php echo $list->sub_category_name; ?></a></li>
					<?php
						}
					?>
                
              </ul>
            </div>
          </div> 
          
          
          
        </div>
      </div><!-- row -->
    

  
      
  <div class="clearfix"></div>
      
  </div> <!-- /container -->
    

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
    <div id="footer" style="height:215px;">
       <div class="container">
         <center style="margin-top:60px"><p class="text-muted"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></p></center>
      <!--    <center><a href="#"><img src="<?php echo base_url();?>front_style/img/fb.png" style="width:30px;height:30px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/tw1.png" style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/g+1.png" style="width:20px;height:20px">&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/like.jpg" style="width:35px;height:20px"></a></center> -->
     <center> <span class='st_facebook_large' displayText='Facebook'></span>
    <span class='st_twitter_large' displayText='Tweet'></span>
    <span class='st_linkedin_large' displayText='LinkedIn'></span>
    <span class='st_googleplus_large' displayText='Google +'></span>
   <!-- <span class='st_fblike_large' displayText='Facebook Like'></span> --></center> 
       </div>
     </div>
 
        <script src="<?php echo base_url(); ?>front_style/js/bootstrap.js"></script>
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
                  var n=12;
                  for(var i=0;i<n;i++)
                    {
                    if(i<10)
                      {
                      $('#navitem0'+i).hide();
                      $('#navitem0'+i).css("position","absolute");
                      $('#navitem0'+i).css("margin-left","395px");
                      var a=$( "#navul" ).height();
                      $('#navitem0'+i).css("height",a);
                      $('#navitem0'+i).css("width","370px");
                      }
                    else
                      {
                      $('#navitem'+i).hide();
                      $('#navitem'+i).css("position","absolute");
                      $('#navitem'+i).css("margin-left","395px");
                      var a=$( "#navul" ).height();
                      $('#navitem'+i).css("height",a);
                      $('#navitem'+i).css("width","370px");
                      }
                     $('#default').show();
                    }
                    $("#default").on("mouseover", function() {
                      for(var i=0;i<n;i++)
                        {
                        if(i<10)
                        	{
                        	$('#navitem0'+i).hide();
                        	}
                        else
                        	{
                        	$('#navitem'+i).hide();
                        	}
                        }
                    });
                    $(".box").on("mouseleave", function() {
                      for(var i=0;i<n;i++)
                        {
                        if(i<10)
                        	{
                        	$('#navitem0'+i).hide();
                        	$('#option0'+i).css("background","#f9fafc");
                        	}
                        else
                        	{
                        	$('#navitem'+i).hide();
                      	  $('#option'+i).css("background","#f9fafc");
                        	}
                        }
                    });
                     $(".antihover").on("mouseover", function() {
                     var lastChar = this.id.substr(this.id.length -2);
                     
                     var j =parseInt(lastChar);
                     for(var i=0;i<n;i++)
                        {
                        if(i==j)
                            {
                            
                            if(i<10)
                              {
							                
                              $('#option0'+i).css("border-left","none");
                              $('#navitem0'+i).show();
                              $('#option0'+j).css("border-left","5px solid orange");
                              }
                           	else
                           		{
                           		$('#option'+i).css("border-left","none");
                              $('#navitem'+i).show();
                              $('#option'+j).css("border-left","5px solid orange");
                           		}
                            }
                        else
                            {
                             if(i<10)
                              {
                              $('#navitem0'+i).hide();
                              $('#option0'+i).css("background","#f9fafc");
                              $('#option0'+i).css("border-left","0");
                              }
                             else
                              {
                              $('#navitem'+i).hide();
                              $('#option'+i).css("background","#f9fafc");
                              $('#option'+i).css("border-left","0");
                              }
                            }
                        }
                   
                   });  
         });
        </script>
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
              }else{
                $('#popup_email_error').html('some error occured');
              }
            }
          });
        }
        
      }
      
    );
   </script>
    </body>
</html>
