<?php
	include('include/front_header.php');

?>
     <div class="container " id="wrapper" style="margin:0 auto;margin-top:125px;">
       <div class="row" style="width:998px;padding:0;margin:0 auto;padding: 0;" >
      
          <!-- Categories -->
         <div class="pull-left" id="leftside-bar" style="margin:0;padding: 0;">
           <div style="background:#e5e5e5;width:252px;height:120px;border-radius: 5px;">
              <div class="orangeborder" style="background:#c9e4f7;width:250px;height:40px;border-bottom:1px solid white;padding:3px 10px 10px 10px;">
			  
                <a href="" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/adsfeed.png">&emsp;Live Feeds</span></strong></a>
              </div>
			  
              
              <div style="background:#e5e5e5;width:250px;height:40px;border-bottom:1px solid white;padding:3px 10px 10px 10px;border-radius: 5px;">
                <a href="<?php echo base_url(),'manage-ads'; ?>" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/manageads.png">&emsp;Manage Ads</span></strong></a>
              </div>
              <div style="background:#e5e5e5;width:250px;height:40px;border-bottom:1px solid white;padding:3px 10px 10px 10px;border-radius: 5px;">
                  <a href="<?php echo base_url(),'messages'; ?>" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/messages.png">&emsp;Messages</span></strong></a>
              </div>
            </div> 
         </div>
         <!-- Categories -->
        
        
         <!-- AD List -->
         <div class="col-xs-8" id="adlist">
           <div class="jumbotron" id="adlisttop" style="width:710px;min-height:730px;padding:0;border-radius:5px;">
             <div class="container">
               <div class="row">
                 <div class="col-xs-12">
                   <div class="row" style="height:45px;font-size:15px;">
                     <ul class="nav nav-tabs" style="background:#c9e4f7;border-radius:5px;">
                       <li class="active" id="activeli" style="padding:0 20px 0 20px;">
                         <a id="navli" href="#activeads" data-toggle="tab">Live Feeds</a>
                       </li>
                       <li style="padding:0 20px 0 20px">
                        <a  id="navli" href="#pendingads" data-toggle="tab">Categories Following</a>
                       </li>
                      
                       <li style="padding:0 20px 0 20px">
                         <a id="navli" href="#favourites" data-toggle="tab">Favourites</a>
                       </li>
                     </ul>
					 
                     <div class="tab-content" style="margin-top: 20px;">
					  <div id="activeads" class="tab-pane active" style="margin-top: 40px;border: 1px solid #e5e5e5;padding: 10px 10px 50px 10px;">
					   
					   <div id="pagination" style="margin-left: 10px;margin-bottom: 10px;">
							<?php echo $links; ?>
					   </div>
                         <!-Active Ads -->
						 <?php
						 	foreach($city_ads as $ad){
						?>
						<div class="row" id="adcontainer" style="background:#edebec;margin:30px 10px 10px 10px;">
						<?php 
					
			  		 $post_name=str_replace(' ', '-',$ad->post_title);  
							$post_name=preg_replace('/[^A-Za-z0-9\-]/', '', $post_name);
							$post_name=preg_replace('/--+/', '-', $post_name);
						   
						   $post_name=strtolower($post_name);
				?>
				<a href="<?php echo base_url(),'ad_details/',$post_name,'/',$ad->post_id;?> ">
                           <div class="col-xs-12" >
                      <!--div class="container"-->
                        <div class="col-xs-3" id="adim">
                          <img style="width:160px;height:115px;margin-left: -12px;" src="
						  	<?php 
							if($ad->ext == ""){
								echo base_url(),'uploads/default.jpg';
							}else{
								echo base_url(),'uploads/',$ad->id,'_thumb.',$ad->ext;
							}
						
						  ?>"
						  
						  " class="img-responsive" alt="Responsive image">
                        </div>
                        <div class="col-xs-7">
                          <div class="row">
                            <p id="adtitle"><strong><?php  echo $ad->post_title;  ?></strong></p>
                          </div>
                          <div class="row" style="margin-left:0px;color: black;font-size: 15px;">
                            <?php echo $ad->description;  ?>
                          </div>
                          <hr id="small">
                          <div class="row">
                            <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px"><?php echo $ad->price;  ?></p>
                            <p class="pull-right" style="font-size:15px;margin:0 15px 0 0"><?php echo $ad->date;  ?></p>
                          </div>
                        </div>
						
                        <div class="col-xs-2" id="adbt">
                          <div class="row">
                            <button class="btn btn-lg" id="reply" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                          </div>
                        </div>
                        
                      <!--/div-->
                    </div><!-- /.col-xs-12 -->
                             
                         </div>
                         <hr id="big"> 
						</a>
						<?php		
							}
						 ?>
                           
                        <div id="pagination" class="pull-right">
					<?php echo $links; ?>
				</div>
                         
                       </div>

					   
					   <div id="pendingads" class="tab-pane" style="padding: 10px 10px 10px 10px;">
                        <!-Pending Ads -->
						<?php
						foreach($categories_following as $category_follow){
						?>
						
						 				
                         
						<?php	
						}
						?> 
                            
                         
                       </div>
                       
                       <div id="favourites" class="tab-pane" style="border: 1px solid #e5e5e5;padding: 10px 10px 10px 10px;">
                         <!-Favourites Ads -->
                       <?php
						 	foreach($favourite_ads as $ad){
						?>
						<div class="row" id="adcontainer" style="background:#edebec;margin:10px;">
						<?php 
					$post_name=str_replace(' ', '-',$ad->post_title);  
							$post_name=preg_replace('/[^A-Za-z0-9\-]/', '', $post_name);
							$post_name=preg_replace('/--+/', '-', $post_name);
						   
						   $post_name=strtolower($post_name);
				?>
				<a href="<?php echo base_url(),'ad_details/',$post_name,'/',$ad->post_id;?> ">
                           <div class="col-xs-12" >
                      <!--div class="container"-->
                        <div class="col-xs-3" id="adim">
                          <img style="width:160px;height:115px;margin-left: -12px;" src="
						  	<?php 
							if($ad->ext == ""){
								echo base_url(),'uploads/default.jpg';
							}else{
								echo base_url(),'uploads/',$ad->id,'_thumb.',$ad->ext;
							}
						
						  ?>"
						  
						  " class="img-responsive" alt="Responsive image">
                        </div>
                        <div class="col-xs-7">
                          <div class="row">
                            <p id="adtitle"><strong><?php  echo $ad->post_title;  ?></strong></p>
                          </div>
                          <div class="row" style="margin-left:0px;color: black;font-size: 15px;">
                            <?php echo $ad->description;  ?>
                          </div>
                          <hr id="small">
                          <div class="row">
                            <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px"><?php echo $ad->price;  ?></p>
                            <p class="pull-right" style="font-size:15px;margin:0 15px 0 0"><?php echo $ad->date;  ?></p>
                          </div>
                        </div>
						
                        <div class="col-xs-2" id="adbt">
                          <div class="row">
                            <button class="btn btn-lg" id="reply" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                          </div>
                        </div>
                        
                      <!--/div-->
                    </div><!-- /.col-xs-12 -->
                             
                         </div>
                         <hr id="big"> 
						</a>
						<?php		
							}
						 ?>
					   
					   
					   
					   
					       
                         
                        
                     
					 
					 
					   </div>
                    </div>
					
					
					
                   </div>
                   
                 </div><!-- /.col-xs-12 -->
                 
               </div>
             </div><!-- container -->
           </div><!-- jumbotron -->       
         </div><!-- AD List -->
       </div> <!-- row --> 
     </div> <!-- container -->
    
     
     
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();  ?>front_style/js/bootstrap.js"></script>
    <script type="text/javascript">
           $( document ).ready(function() {
                  var t1;
                  var t2;
                  t1 = 0;
                  t2 = 0;
				         $('.trigger1').popover({
				                 'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t2==1){
                          //hide popover
                          $('.trigger2').popover('hide');
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
                          $('.trigger1').popover('hide');
                          t1=0;
                          }
                          t2=1;
                          return $(this).parent().find('.head').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.content').html();
                      }
                  });   
                  });
  </script>
<?php
	include('include/front_footer.php');
?>
