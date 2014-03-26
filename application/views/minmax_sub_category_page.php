<?php
  include('include/front_header_minmax_sub_category.php');

?>
<div class="container" id="wrapper" style="width:100%;margin:0 auto;margin-top:25px;">
    
        <div class="row" style="width:1024px;padding:0;margin:0 auto;margin-top:24px;margin-bottom:10px;" >
      
          <!-- Categories -->
          <div class="col-sm-3" id="leftside-bar" style="width:230px;margin:0 0 0 -2px;border:1px bold #eee;">
        
            <div class="panel-group" id="categories" style="margin-bottom:15px;">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-category">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" style="color:black;" data-toggle="collapse" data-parent="#categories" href="#category">
                     Categories<img class="pull-right" style="width:20px;height:20px;" src="<?php echo base_url(); ?>front_style/img/dr.png">
                   </a>
                  </h4> 
                </div>
             <div id="category" class="panel-collapse collapse in">
               <div class="panel-body" style="margin-left:15px;">
                 <div id="allcategory" class="panel-collapse collapse in">
                   <a  id="nounderline"  href="<?php echo base_url();  ?> ">All category</a>
                  
                   </div><!--All category-->   
                     <div id="subcategory">
                       <div id="realsestate">
             <?php 
             
            $cat_name=str_replace(' ', '-',$category->category_name);  
              $cat_name=preg_replace('/[^A-Za-z0-9\-]/', '', $cat_name);
              $cat_name=preg_replace('/--+/', '-', $cat_name);
               
               $cat_name=strtolower($cat_name);
              ?>
                         <a  id="nounderline" href="<?php echo base_url(),$cat_name;  ?>">
                          &emsp;<?php  echo $category->category_name; ?>
                         </a>
                         <div id="realsestatelist">
              &emsp;&emsp;&emsp;&emsp;<?php echo $category->sub_category_name; ?><br>
                         </div>
                       </div>          
                     </div>
                   </div><!--panel body-->      
                 </div>
               </div>
             </div>


             <div class="panel-group" id="pricecol" style="margin-bottom:15px;">
               <div class="panel panel-default">
                 <div class="panel-heading" id="panel-price">
                   <h4 class="panel-title">
                      <div class="row">
                        <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#pricecol" style="padding-left:5%;padding-right:5%;color:black;" href="#pricerange">
                      Price<img  style="width:20px;height:20px;margin-left: 172px;" src="<?php echo base_url(); ?>front_style/img/dr.png">
                        </a>
                    
                     </div>
                   </h4> 
                 </div>
               
               <div class="panel-collapse collapse in" id="pricerange">
                 <div class="panel-body">
                   <div class="row"> 
                     
                       <div class="col-sm-4" style="margin-left:20px;">
                         
                           <input type="text"  style="background-color:#f5f5f5;height:32px;width:90px;font-size: 12px;"  class="form-control" placeholder="min" id="min" value="<?php if($min == 0 && $max ==0 ){} else{ echo $min;}  ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'min'">
                        
                      </div>
                      <div class="col-sm-4 " style="">
                        
                          <input type="text"  style="background-color:#f5f5f5;height:32px;width:90px;font-size: 12px;" class="form-control" placeholder="max" id="max" value="<?php if($min == 0 && $max ==0 ){} else{ echo $max;}  ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'max'">
                            
                       
                      </div>
                      <div class="col-sm-1" >
                        <?php
              
                 $sub_cat_name=str_replace(' ', '-',$category->sub_category_name);  
              $sub_cat_name=preg_replace('/[^A-Za-z0-9\-]/', '', $sub_cat_name);
              $sub_cat_name=preg_replace('/--+/', '-', $sub_cat_name);
               
               $sub_cat_name=strtolower($sub_cat_name);
            
            ?>
                          <button class="btn btn-default" style="background-color:#e5e5e5;color:white;height:25px;padding:0 5px;margin-left: 4px;margin-top: 4px;" type="button" onclick=minmax(<?php echo $sub_category_id,',','"',$sub_cat_name,'"'; ?>); ><i class="glyphicon glyphicon-chevron-right"></i></button>
                       
                      </div>
                    </div>
                  </div>
                </div><!-- input-group -->
              </div>
            </div>  
          
          
            <div class="panel-group" id="sellertype">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-seller">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"  data-parent="#sellertype" href="#listseller">
                  Seller Type<img  style="width:20px;height:20px;margin-left: 128px;" src="<?php echo base_url(); ?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in" id="listseller">
                <div class="panel-body"style="margin-left:-4px;">
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type" <?php if($seller_type == 'any'){ echo 'checked="checked"'; }   ?> id="any" value="any"> Any
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type" <?php if($seller_type == 'individual'){ echo 'checked="checked"'; }   ?> id="individual" value="individual"> Individual
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type" <?php if($seller_type == 'business'){ echo 'checked="checked"'; }   ?>  id="business" value="business"> Business
                     </label>
                   </div>
                </div>
              </div><!-- input-group -->
            </div>
          </div>
      
      <?php 
            if(!empty($types)){
      ?>
      <!--types-->
      <br />
      
      <div class="panel-group" id="producttype" >
              <div class="panel panel-default" style="background:#fafbfd">
                <div class="panel-heading" id="panel-product" style="background:#e5e5e5">
                  <h4 class="panel-title" >
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"   data-parent="#producttype" href="#listproduct">
                  Type<img style="width:20px;height:20px;margin-left:172px" src="<?php echo base_url();?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in pre-scrollable" id="listproduct">
                <div class="panel-body" style="margin-left:15px;">
        <div class="checkbox">
                     <label>
                       <input type="radio" name="product_type" id="product_type" <?php if($product_type == 'any'){ echo 'checked="checked"'; }   ?> value="any"> Any
                     </label>
                   </div>
                   
           <?php
                foreach($types as $type){
           ?>
           <div class="checkbox">
           <label>
                       <input type="radio" name="product_type" <?php if($product_type == $type->type_id){ echo 'checked="checked"'; }   ?> value="<?php echo $type->type_id;  ?>"> <?php echo $type->type_name;  ?>
                   </label>
           </div>
           <?php
                  
                }
          ?>
            
           
                
                   
                </div>
              </div><!-- input-group -->
            </div>
          </div>
        <?php
    
    }
    ?>

    <br/>
            <?php
              if($this->session->userdata('city_id') == 0 ){
            ?> 
            <div class="panel-group" id="located_in" style="display:none;">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-location" style="background:#e5e5e5">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"  data-parent="#located_in" href="#list_located_in">
                  Located In<img  style="width:20px;height:20px;margin-left: 134px;" src="<?php echo base_url(); ?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in pre-scrollable" id="list_located_in">
                <div class="panel-body" style="margin-left:-4px;">
                   <div class="checkbox">
                      <label>
                       <input type="radio" name="located_in" value="any" checked="true"> Any
                      </label>
                   </div>
                   
                </div>
              </div><!-- input-group -->
            </div>
          </div>   
            <?php
              }else{
            ?> 
            <div class="panel-group" id="located_in">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-location" style="background:#e5e5e5">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"  data-parent="#located_in" href="#list_located_in">
                  Located In<img  style="width:20px;height:20px;margin-left: 134px;" src="<?php echo base_url(); ?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in pre-scrollable" id="list_located_in">
                <div class="panel-body" style="margin-left:-4px;">
                   <div class="checkbox">
                      <label>
                       <input type="radio" name="located_in" value="any" <?php if($located_in == 'any'){echo "checked"; } ?> > Any
                      </label>
                   </div>
                   <?php 
                      foreach ($hoods as $hood) {
                        # code...
                   ?>
                   <div class="checkbox">
                      <label>
                       <input type="radio" name="located_in" value="<?php echo $hood->hood_name;  ?>" <?php if($hood->hood_name == $located_in){echo "checked"; } ?>  > <?php echo $hood->hood_name;  ?>
                      </label>
                   </div>
                   <?php     
                      }
                    ?>
                </div>
              </div><!-- input-group -->
            </div>
          </div>
          <?php    
              }
            ?>
            
        </div><!-- Categories -->
        
        
        <!-- AD List -->
        <div class="col-sm-8" id="aalist" style="width:724px;padding:0">
          <div class="jumbotron" id="aalisttop" style="width:724px;padding:0">
            <div class="container" >
      
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-7" style="margin: 0;padding: 0 0 0 10px;">
                      <div class="pull-left"><p><strong><?php echo $category->sub_category_name;  ?></strong>
            <?php
            if($this->session->userdata('logged_in')){
              if($follow == 0){
            ?>
            <span id="follow">
              <button class="btn btn-lg"  style="background-color:#166fa7;width:84px;height:22px;color:white;font-size:11px;padding:0;margin-left:15px;border-radius:1px" id="follow_button" onclick="follow_sub_category(<?php echo $sub_category_id,',',$this->session->userdata('user_id'),',','\'',$category->sub_category_name,'\''; ?>)"><img style="margin:0;width: 15px;height: 15px;margin-top: -2px;margin-left: -8px;" src="http://uploads.zeromaze.com/uploads/plus.png"><span style="margin: 0;"> Follow</span></button>
            </span>
            
            <?php 
              }else{
            ?>
            <span id="follow">
            <button class="btn btn-lg"  style="background-color:#166fa7;width:84px;height:22px;color:white;font-size:11px;padding:0;margin-left:15px;border-radius:1px" id="unfollow_button" onclick="unfollow_sub_category(<?php echo $sub_category_id,',',$this->session->userdata('user_id'),',','\'',$category->sub_category_name,'\''; ?>)"><img style="margin:0;width: 15px;height: 15px;margin-top: -2px;margin-left: -8px;" src="http://uploads.zeromaze.com/uploads/minus.png"><span style="margin: 0;"> Unfollow</span></button>
            </span>
            <?php   
            }
            }
            
              ?>
             </p></div>
                    </div>
                    <div class="col-sm-5" style="margin: 0;padding: 0;">
                      <div class="left-inner-addon">
                        <i class="glyphicon glyphicon-search" style="padding:4px 0 0 6px;"></i>
                        <input id="local_search" style="background-color:#f5f5f5;" type="text" class="form-control" placeholder="Search Within <?php echo $category->sub_category_name;  ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Within <?php echo $category->sub_category_name;  ?> '  ">
                      </div><!-- left-inner-addon -->
                    </div>
                 </div>
               </div><!-- /.col-sm-12 -->
                
            </div>
            <hr id="big"> 
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="row">
                     <div class="col-sm-9" style="font-size:15px;padding-left: 0;margin-left: 10px;">
                       <ul class="breadcrumb" style="margin:0;padding:0;">  
                         <li>  
                           <a href="<?php  echo base_url(); ?>">All</a> 
                         </li><li class="active"><?php echo $category->sub_category_name;  ?></li>  
                       </ul>
                     </div>
                     <!--<div class="col-sm-3">
                       <p class="pull-left" style="font-size:15px;padding:5px 0 0 0;">1000 Results</p>
                     </div>-->
                   </div>
                 </div>
                 <div class="col-sm-4" style="font-size:15px;">
                   <div class="row pull-right" >
                       
                       <select class="form-control input-sm" id="sort_by" name="soty_by" style="display: inline-block;width:180px;">
                         <?php
                              if($sort_by == 1){
                            ?>
                          
                              <option value="1">price min to max</option>
                                           <option value="2">price max to min</option>
                                           <option value="3">new-old</option>
                            <?php
                              }else if($sort_by == 2){
                            ?>
                              
                                           <option value="2">price max to min</option>
                                           <option value="3">new-old</option>
                               <option value="1">price min to max</option>
                            <?php   
                              }else{
                            ?>
                            
                                           <option value="3">new-old</option>
                               <option value="1">price min to max</option>
                               <option value="2">price max to min</option>
                            <?php   
                              }
                            ?>
                       </select>
                    </div>
                  </div>
                            
                </div><!-- /.col-sm-12 -->
                
              </div>
              <hr>
                <div class="row" id="aacontainer" style="background:#fff; padding:10px;">
                  <div class="col-sm-12" style="margin-top: 10px;">
                    <img style="width:100%;height:90px" src="<?php echo base_url(); ?>front_style/img/ad1.png"class="img-responsive" alt="Responsive image">
                  </div><!-- /.col-sm-12 -->
                </div>
        
        
                <div id="pagination" style="padding-left:10px;">
          <?php echo $links; ?>
        </div>
        <div class="col-sm-12" id="aalistmain" style="border: 2px solid #edebec;padding-bottom: 10px;">
        
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
                              if(strlen($ad->post_title) > 40){
                                 $str =  substr($ad->post_title, 0, 40).'...';
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
                            echo $category->sub_category_name; ; 
                            if($this->session->userdata('city') !== 'yuplee' ){
                                $session_city= $this->session->userdata('city');
                                $session_city = ucfirst($session_city);
                                echo " | in $session_city";
                            }
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
                        <div class="col-sm-12" style="min-height:100px;background:#e5e5e5;">
                  <h2 style="font-size:19px;color:#166fa7;"><?php  echo $main_title; ?></h2>
                  <p style="font-size:12px;color:grey;"><?php echo $seo_desc;  ?></p>
                </div> 
                
                
                 </div>
              </div><!-- container -->
            </div><!-- jumbotron -->
            
            <div id="pagination" class="pull-right">
          <?php echo $links; ?>
        </div>
            
        </div><!-- AD List -->
         
       
      </div> <!-- row -->
      
     
      
    </div> <!-- container -->
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
                  });
  </script>
  <script>
    function minmax(category_id,category_name){
      var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
      var min=$('#min').val();
      var max=$('#max').val();
      var sort_by=$('#sort_by').val();
      var product_type=$("input[type='radio'][name='product_type']:checked").val();
      var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
      if(min == "" | max == ""){
        
      }else{
        window.location.href=base_url + "filter/" + category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
      
    }
    
  </script>
  
  <script>
    $('#any').click(
      function(){
        var sub_category_name="<?php echo $sub_cat_name;    ?>";
        var category_id="<?php echo $sub_category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var product_type=$("input[type='radio'][name='product_type']:checked").val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type ;
        
      }else{
        window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
        
      }
    );
    
  </script>
  
  <script>
    $('#individual').click(
      function(){
        var sub_category_name="<?php echo $sub_cat_name;    ?>";
        var category_id="<?php echo $sub_category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var product_type=$("input[type='radio'][name='product_type']:checked").val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;
        
      }else{
        window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
      }
    );
    
  </script>
  
  <script>
    $('#business').click(
      function(){
        var sub_category_name="<?php echo $sub_cat_name;    ?>";
        var category_id="<?php echo $sub_category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var product_type=$("input[type='radio'][name='product_type']:checked").val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;
        
      }else{
        window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
      }
    );
    
  </script>
  
  <script>
    $('#sort_by').change(
      function(){
        var sub_category_name="<?php echo $sub_cat_name;    ?>";
        var category_id="<?php echo $sub_category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var product_type=$("input[type='radio'][name='product_type']:checked").val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;
        
        }else{
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
        }
      }
    );
  </script>
  
  <script>
    $("input[name='product_type']").click(
      function() {
      var product_type=this.value;
      var sub_category_name="<?php echo $sub_cat_name;    ?>";
      var category_id="<?php echo $sub_category_id;    ?>";
      var min=$('#min').val();
      var max=$('#max').val();
      var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
      var sort_by=$('#sort_by').val();
      var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
      if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;
        
      }else{
        window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
    }
    );
  </script>

  <script>
    $("input[name='located_in']").click(
      function() {
      var product_type=$("input[type='radio'][name='product_type']:checked").val();
      var sub_category_name="<?php echo $sub_cat_name;    ?>";
      var category_id="<?php echo $sub_category_id;    ?>";
      var min=$('#min').val();
      var max=$('#max').val();
      var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
      var sort_by=$('#sort_by').val();
      var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
      if(min == "" | max == ""){
          window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + 0 + "/" + 0 + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;
        
      }else{
        window.location.href=base_url + "filter/" + sub_category_name + "/" + located_in + "/"+ category_id +"/" + min + "/" + max + "/" + 1 + "/" + seller_type + "/" + sort_by + "/" + product_type;  
      }
    }
    );
  </script>

  <script>
    $('#local_search').keypress(function(e) {
         if(e.which == 13 || e.keyCode == 13) {
            var local_search_key=$('#local_search').val();
        var category_name="<?php echo $sub_cat_name;    ?>";
        var category_id="<?php echo $sub_category_id;    ?>";
        if(local_search_key == ""){
          
        }else{
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + 'insearch/' +  category_name + '/' +  local_search_key + '/' + category_id + '/' +1;
        }
        return false;
        }
    });
   </script>
     <script>
      function follow_sub_category(sub_category_id,user_id,sub_category_name){
        
        datas='sub_category_id='+ sub_category_id + '&user_id=' + user_id + '&sub_category_name=' + sub_category_name;
        $.ajax({
          type: "POST",    
          url: base_url + 'home/follow_sub_category',
          data: datas,
          success: function(msg)
          {
            $('#follow').html(msg);
          }
        });
      }
    </script>
    
  <script>
      function unfollow_sub_category(category_id,user_id,sub_category_name){
        datas='sub_category_id='+ category_id + '&user_id=' + user_id + '&sub_category_name=' + sub_category_name;
        $.ajax({
          type: "POST",    
          url: base_url + 'home/unfollow_sub_category',
          data: datas,
          success: function(msg)
          {
            $('#follow').html(msg);
          }
        });
      }
    </script>
    <script>
      $(window).scroll(function(){
        if ($(window).scrollTop() > 150){
          $("#leftside-bar").css({"top": ($(window).scrollTop()) -170 + "px"});
        }else{
          $("#leftside-bar").css({"top": 0 + "px"});
        }
      });
    </script> 
   <script>
      $(window).scroll(function(){
        if ($(window).scrollTop() > 150){
          if ($(window).scrollTop() > ($('#aalistmain').height() - 200)){
            $("#leftside-bar").css({"top": ($(window).scrollTop()) -550 + "px"});
          }
        }
      });
    </script>
    <script>
      $(window).scroll(function(){
        if ($(window).scrollTop() > 150){
          $("#leftside-bar").css({"top": ($(window).scrollTop()) -170 + "px"});
        }else{
          $("#leftside-bar").css({"top": 0 + "px"});
        }
      });
    </script> 
   <script>
      $(window).scroll(function(){
        if ($(window).scrollTop() > 150){
          $('#listproduct').removeClass("in");
          if ($(window).scrollTop() > ($('#aalistmain').height() - 200)){
            $("#leftside-bar").css({"top": ($(window).scrollTop()) -550 + "px"});
          }
        }else{
          $('#listproduct').addClass("in");
        }
      });
    </script>
  
<?php
  include('include/front_footer.php');
?>