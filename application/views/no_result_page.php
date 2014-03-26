<?php
	include('include/front_header.php');

?>

     <div class="container " id="wrapper" style="margin:0 auto;margin-top:85px;">
      <div class="rows" style="margin-top:24px;padding-top:1px;padding-bottom:1px;">
        <div class="box" style="background-color:#fff;width:1000px;margin:0 auto;">
          <div class="box-header" data-original-title="" style="background-color:#e5e5e5;margin:0 auto;">
            <h5 style="color:#000;font-weight: bold;">&emsp;Browse by Category</h5>
          </div>
          <!-- <div class="box-content"> -->
          <div class="sidenav">
            <ul class="nav nav-stacked col-xs-3" id="navul" >
             <li class="liborder1 antihover" id="option01"><a href="<?php echo base_url(),'mobile-phones';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/mobilephones1.png>&emsp;Mobile Phones</span></strong></a>
              </li><li class="liborder1 antihover" id="option02"><a href="<?php echo base_url(),'automobiles';?>" ><strong><span style="color:black;font-size:16px;margin-top:0;"><img class="circleborder" src=<?php echo base_url();?>front_style/img/automobile1.png>&emsp;Automobiles</span></strong></a>
              </li><li class="liborder1 antihover" id="option03"><a href="<?php echo base_url(),'electronics';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/electronics1.png></i>&emsp;Electronics</span></strong></a>
              </li><li class="liborder1 antihover" id="option04"><a href="<?php echo base_url(),'jobs';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/jobs1.png>&emsp;Jobs</span></strong></a>
              </li><li class="liborder1 antihover" id="option05"><a href="<?php echo base_url(),'classes';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/classes1.png>&emsp;Classes</span></strong></a>
              </li><li class="liborder1 antihover" id="option06"><a href="<?php echo base_url(),'real-estate';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/realestate1.png>&emsp;Real Estate</span></strong></a>
              </li><li class="liborder1 antihover" id="option07"><a href="<?php echo base_url(),'home-lifestyle';?>" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/lifestyle1.png >&emsp;Home & Lifestyle</span></strong></a>
              </li><li class="liborder1 antihover" id="option00"><a href="" ><strong><span style="color:black;font-size:16px"><img class="circleborder" src=<?php echo base_url();?>front_style/img/others.png>&emsp;Others</span></strong></a>
			  </li>
            </ul>
          </div>
          <!-- </div> -->
          
          <div class="col-xs-7" id="default">
            <div class="row" style="background:#e5e5e5;margin:10px;padding:10px;">
            <span style="font-size:18px;font-weight:bold;padding:10px;"><img src="img/noresult.png">&emsp;No Results Found</span>
            </div>
          </div>
      
          <div class="col-xs-7 antihover" id="navitem01" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="padding-left:0;font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              
		              <?php
						foreach($mobile_phones as $mobile_phone){
							$title=str_replace(' ', '-',$mobile_phone->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						    $title=strtolower($title);
					  ?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $mobile_phone->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>
        
          <div class="col-xs-7 antihover" id="navitem02" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($automobiles as $automobile){
							$title=str_replace(' ', '-',$automobile->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
						   
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $automobile->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>
          
          <div class="col-xs-7 antihover" id="navitem03" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($electronics as $electronic){
							$title=str_replace(' ', '-',$electronic->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
						    $title=preg_replace('/--+/', '-', $title);
						    $title=strtolower($title);
						   
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $electronic->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>          
          
          <div class="col-xs-7 antihover" id="navitem04" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($jobs as $job){
						   $title=str_replace(' ', '-',$job->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $job->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          <div class="col-xs-6" style="border-left: thin solid #aaa">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($jobs1 as $job){
						   $title=str_replace(' ', '-',$job->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $job->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
            </div>
          </div>  
          
          <div class="col-xs-7 antihover" id="navitem05" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($classes as $class){
						   $title=str_replace(' ', '-',$class->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $class->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>   
          
          <div class="col-xs-7 antihover" id="navitem06" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($real_estates as $real_estate){
						   $title=str_replace(' ', '-',$real_estate->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $real_estate->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>    
          
          <div class="col-xs-7 antihover" id="navitem07" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Sub Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <?php
						foreach($life_styles as $life_style){
						   $title=str_replace(' ', '-',$life_style->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
					?>
					<li><a id="nomargin1" href=" <?php echo base_url(),$title; ?>  "><?php echo $life_style->sub_category_name; ?></a></li>
					<?php
						}
					?>
		            </ul>
		          </div>
		          
            </div>
          </div>
          <div class="col-xs-7 antihover" id="navitem00" style="background: white;border: 2px solid #e5e5e5;margin-top: 4px;">
            <div class="row">
            	<div class="col-xs-12">
            			<p style="font-weight:bold;margin-top:5px;font-size: 16px;">Choose Category</p>
		              <hr style="border-color:#aaa">
		          </div>
            </div>
            <div class="row">
		          <div class="col-xs-6">
		            <ul class="nav nav-stacked">
		              <li><a id="nomargin1" href=" <?php echo base_url(),'services'; ?>  ">Services</a></li>
						<li><a id="nomargin1" href=" <?php echo base_url(),'events'; ?>  ">Events</a></li>
						<li><a id="nomargin1" href=" <?php echo base_url(),'list-business'; ?>  ">List Buisiness</a></li>
						<li><a id="nomargin1" href=" <?php echo base_url(),'school-colleges'; ?>  ">School & Colleges</a></li>
						<li><a id="nomargin1" href=" <?php echo base_url(),'tourist-places'; ?>  ">Tourist Places</a></li>
		            </ul>
		          </div>
		          
            </div>
          </div> 
          </div>                               
          
        </div>
      </div><!-- row -->
    

   <div class="row" style="width:1000px; margin:12px auto;">
		
			<div class="col-xs-10" style="min-height:625px;">
			  
			  <div class="row" style="height:110px;background:#fbf7f8;">
				  <div class="row" style="height:90px;margin:10px;">
					  <img style="width:100%;height:90px" src="<?php echo base_url();?>front_style/img/ad1.png"class="img-responsive" alt="Responsive image">
				  </div>
			  </div>
			  
			  
			  <div class="row" style="min-height:465px;">
				<div class="col-xs-12" style="background-color:white; min-height:160px; width:100%;border-radius:5px;">
				
				  <div class="row" style="height:45px;background:#e5e5e5;margin-top:0px;border-radius:5px;">
					  <p style="font-size:16px;color:black;padding-top:13px;margin-left:14px; ">Choose Your Location</p>
				  </div>
				  
				  
				  <div class="row" style="margin-top:10px;">
					  <div class="col-xs-5">
					    <div class="row">
						    <p style="font-size:16px;font-weight:bold;color:black;padding-left:14px;">Top Cities</p>
					    </div>
					  </div>
					  <div class="col-xs-7">
					    <div class="row">
						    <p style="font-size:16px;font-weight:bold;color:black;padding-left:20px;">States</p>
					    </div>
					  </div>
					</div>
					
					<hr style="margin:0 0 10px 0"/>
              
          <div class="col-xs-5" style="min-height:350px;padding:0;">
			      <div class="col-xs-6" style="margin-left: 0;padding-left: 0;">
				      <?php
					  foreach($top_cities as $top_city){
					  	$city_name=preg_replace('/[^A-Za-z0-9\-_]/', ' ', $top_city->city_name);
						$city_name=strtolower($city_name);
					    $city_name=explode(" ",$city_name);
					    $city_name=implode("_",$city_name);
					  ?>
					  <a id="nounderline1" href="<?php echo 'http://',$city_name,'.zeromaze.com';?>"><?php echo $top_city->city_name;  ?></a><br/>
					  <?php
		  			  }
					  ?>
			      </div>
			      <div class="col-xs-6">
				      <?php
					  foreach($bottom_cities as $bottom_city){
					  	$city_name=preg_replace('/[^A-Za-z0-9\-_]/', ' ', $bottom_city->city_name);
						$city_name=strtolower($city_name);
					    $city_name=explode(" ",$city_name);
					    $city_name=implode("_",$city_name);
					  ?>
					  <a id="nounderline1" href="<?php echo 'http://',$city_name,'.zeromaze.com';?>"><?php echo $bottom_city->city_name;  ?></a><br/>
					  <?php
		  			  }
					  ?>
			      </div>
			    </div>
					  
				  <div class="col-xs-7" style="min-height:350px;padding:0">
				    <div class="col-xs-6">
					    <?php
					  foreach($top_states as $top_state){
					  	$state_name=preg_replace('/[^A-Za-z0-9\-_]/', ' ', $top_state->state_name);
						$state_name=strtolower($state_name);
					    $state_name=explode(" ",$state_name);
					    $state_name=implode("_",$state_name);
					  ?>
					  <a id="nounderline1" href="<?php echo 'http://',$state_name,'.zeromaze.com';?>"><?php echo $top_state->state_name;  ?></a><br/>
					  <?php
		  			  }
					  ?>
				    </div>
				    <div class="col-xs-6">
					    <?php
					  foreach($bottom_states as $bottom_state){
					  	$state_name=preg_replace('/[^A-Za-z0-9\-_]/', ' ', $bottom_state->state_name);
						$state_name=strtolower($state_name);
					    $state_name=explode(" ",$state_name);
					    $state_name=implode("_",$state_name);
					  ?>
					  <a id="nounderline1" href="<?php echo 'http://',$state_name,'.zeromaze.com';?>"><?php echo $bottom_state->state_name;  ?></a><br/>
					  <?php
		  			  }
					  ?>
				    </div>
				  </div>
				  
			 </div>
		  </div>
		</div>
    
    <div class="col-xs-2" style="background-color:#f5f5f5;padding:0">
         <span class="pull-right">
          <img style="width:150;height:600px" src="<?php echo base_url();?>front_style/img/ad2.png"class="img-responsive" alt="Responsive image"> 
         </span>
    </div>
  </div>
      
  <div class="clearfix"></div>
      
  </div> <!-- /container -->
    
    <div id="footer" style="height:215px;">
       <div class="container">
         <center style="margin-top:60px"><p class="text-muted"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></p></center>
         <center><a href="#"><img src="<?php echo base_url();?>front_style/img/fb.png" style="width:30px;height:30px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/tw1.png" style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/g+1.png" style="width:20px;height:20px">&nbsp;<a href="#"><img src="<?php echo base_url();?>front_style/img/like.jpg" style="width:35px;height:20px"></a></center>
       </div>
     </div>
        
		<script src="<?php echo base_url();?>front_style/js/bootstrap.js"></script>
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
                   var n=9;
                  for(var i=0;i<n;i++)
                    {
                    if(i<10)
                      {
                      $('#navitem0'+i).hide();
                      $('#navitem0'+i).css("position","absolute");
                      $('#navitem0'+i).css("margin-left","235px");
                      var a=$( "#navul" ).height();
                      $('#navitem0'+i).css("height",a);
                      $('#navitem0'+i).css("width","510px");
                      }
                    else
                      {
                      $('#navitem'+i).hide();
                      }
                     $('#default').show();
                    }
                    $("#default").on("mouseover", function() {
                      for(var i=0;i<n;i++)
                        {
                        $('#navitem0'+i).hide();
                        }
                    });
                    $(".box").on("mouseleave", function() {
                      for(var i=0;i<n;i++)
                        {
                        $('#navitem0'+i).hide();
                        $('#option0'+i).css("background","#f8f5f0");
                        $('#option0'+i+' a span').css("color","#000");
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
                              
                       			 $('#option0'+i+' a span').css("color","#166fa7");
                              //$('#option0'+j).css("border-left","5px solid orange");
                              }
                           //   $('#default').hide();
                            }
                        else
                            {
                             if(i<10)
                              {
                              $('#navitem0'+i).hide();
                              $('#option0'+i).css("background","#f8f5f0");
                              $('#option0'+i+' a span').css("color","#000");
                              //$('#option0'+i).css("border-left","0");
                              }
                            }
                        }
                   
                   });  
         });
        </script>
    </body>
</html>
