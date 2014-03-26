<?php
  include('include/front_header.php');

?>
     <div class="container " id="wrapper" style="margin:0 auto;margin-top:25px;">
       <div class="row" style="width:998px;padding:0;margin:0 auto;padding: 0;" >
      
          <!-- Categories -->
         <div class="pull-left" id="leftside-bar" style="margin:0;">
           <div style="background-color: rgb(248, 245, 240);width:254px;height:122px;border:1px solid #e5e5e5; ">
              <div  style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
        
                <a href="" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/adsfeed2.png">&emsp;Live Feeds</span></strong></a>
              </div>
        
              
              <div style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
                <a href="<?php echo base_url(),'manage-ads'; ?>" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/manageads1.png">&emsp;Manage Ads</span></strong></a>
              </div>
              <div style="background-color: rgb(248, 245, 240);height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
                  <a href="<?php echo base_url(),'messages'; ?>" ><strong><span style="color:black;font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/messages1.png">&emsp;Messages</span></strong></a>
              </div>
            </div> 
         </div>
         <!-- Categories -->
        
        
         <!-- AD List -->
         <div class="col-xs-8" id="aalist">
           <div class="jumbotron" id="aalisttop" style="width:710px;min-height:500px; padding:0 15px 10px 15px;border-radius:5px; ">
             <div class="container" style="padding:0;">
               <div class="row" style="border:1px solid #e5e5e5;padding-bottom:10px;">
                 <div class="col-xs-12">
                   <div class="row" style="height:45px;font-size:15px;">
                     <ul class="nav nav-tabs" style="background:#e5e5e5;border-radius:0;">
                       <li class="active" id="activeli" style="padding:0 0px 0 20px;">
                         <a id="navli" href="#activeads" data-toggle="tab">Live Feeds</a>
                       </li>
                       <li style="padding:0 0px 0 0px">
                        <a  id="navli" href="#pendingads" data-toggle="tab">Categories Following</a>
                       </li>
                      
                       <li style="padding:0 0px 0 0px">
                         <a id="navli" href="#favourites" data-toggle="tab">Favourites</a>
                       </li>
                     </ul>
                    <div class="col-xs-12">
                     <div class="row">
                     <div class="container">
                     <div class="tab-content" style="margin-top: 20px;">
            <div id="activeads" class="tab-pane active" style="border: 1px solid #e5e5e5;padding: 10px 0px 50px 0px;">
             <div class="container">
             <div id="pagination" style="margin-left: 10px;margin-bottom: 10px;">
              <?php echo $links; ?>
             </div>
                         <!-Active Ads -->
             <?php
        foreach($city_ads as $ad){
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
                              if(strlen($ad->post_title) > 35){
                                 $str =  substr($ad->post_title, 0, 35).'...';
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
                             
                                $session_city = $this->session->userdata('profile_city_name');
                                $session_city = ucfirst($session_city);
                                echo "  $session_city";
                            
                          ?> 
                          </div>
                          <?php
                            $old_date=new DateTime($ad->date);
                            $diff_time = $curret_date->diff($old_date);
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
                           
                        <div id="pagination" class="pull-right">
          <?php echo $links; ?>
        </div>
                         
                       </div>

             </div>
             <div id="pendingads" class="tab-pane" style="border: 1px solid #e5e5e5;padding: 10px 10px 10px 10px;">
                        <!-Pending Ads -->
                        <div class="container">
            <?php
            $city_name=str_replace(' ', '-',$city_name->city_name);  
              $city_name=preg_replace('/[^A-Za-z0-9\-]/', '', $city_name);
              $city_name=preg_replace('/--+/', '-', $city_name);
              $city_name=strtolower($city_name);
            foreach($categories_following as $category_follow){
              
              $category_follow_name=str_replace(' ', '-',$category_follow->category_name);  
              $category_follow_name=preg_replace('/[^A-Za-z0-9\-]/', '', $category_follow_name);
              $category_follow_name=preg_replace('/--+/', '-', $category_follow_name);
              $category_follow_name=strtolower($category_follow_name);
               
                $sub_category_follow_name=str_replace(' ', '-',$category_follow->sub_category_name);  
              $sub_category_follow_name=preg_replace('/[^A-Za-z0-9\-]/', '', $sub_category_follow_name);
              $sub_category_follow_name=preg_replace('/--+/', '-', $sub_category_follow_name);
              $sub_category_follow_name=strtolower($sub_category_follow_name);
              if($category_follow->sub_category_id == 0 ){
            ?>
              <p style="width: 200px;float: left;"><a href="<?php echo 'http://',$city_name,'.zeromaze.com/',$category_follow_name;  ?>"> <?php echo $category_follow->category_name;  ?> </a></p>
            <?php
              }else{
            ?>
              <p style="width: 200px;float: left;"><a href="<?php echo 'http://',$city_name,'.zeromaze.com/',$sub_category_follow_name;  ?>"><?php echo $category_follow->sub_category_name;  ?></a> </p>
            <?php   
              } 
            }
            ?> 
                            
                        </div>
                       </div>
                       
                       <div id="favourites" class="tab-pane" style="border: 1px solid #e5e5e5;padding: 10px 0px 10px 0px;">
                         <!-Favourites Ads -->
                         <div class="container">
                       <?php
        foreach($favourite_ads as $ad){
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
                              if(strlen($ad->post_title) > 35){
                                 $str =  substr($ad->post_title, 0, 35).'...';
                                 $str = strip_tags($str);
                                 $str = strtolower($str);
                                 echo $str;  
                              }else{
                                echo $ad->post_title;
                              }
                              
                            ?>
  
                           
                          </div>
                          <div class="col-sm-3" style="font-size:18px;fcolor:#166fa7;padding-right:0px;padding-left:0px;"><div class="pull-right" style="font-family:Arial,Helvetica,sans-serif;">&#8377; <?php echo $ad->price;  ?></div> </div> 
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
                             
                                $session_city = $this->session->userdata('profile_city_name');
                                $session_city = ucfirst($session_city);
                                echo "  $session_city";
                            
                          ?>  
                          </div>
                          <?php
                            $old_date=new DateTime($ad->date);
                            $diff_time = $curret_date->diff($old_date);
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
          
          
          
                   </div>
                   
                 </div><!-- /.col-xs-12 -->
                 </div></div></div>
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
