<?php
  include('include/front_header_minmax.php');

?>

<div class="container" id="wrapper" style="width:100%;margin:0 auto;margin-top:25px;">    
        <div class="row" style="width:1024px;padding:0;margin:0 auto;margin-top:24px;margin-bottom:10px;" >
      
          <!-- Categories -->
          <div class="col-sm-3" id="leftside-bar" style="width:230px;margin:0 0 0 -2px;border:1px bold #eee;">
        
            <div class="panel-group" id="categories" style="margin-bottom:15px;">
              <div class="panel panel-default" style="background:#fafbfd">
                <div class="panel-heading" id="panel-category" style="background:#e5e5e5">
                  <h4 class="panel-title">
                  <a class="accordion-toggle" id="nounderline" style="color:black;" data-toggle="collapse" data-parent="#categories" href="#category">
                   Categories<img style="width:20px;height:20px;margin-left:125px" src="<?php echo base_url();?>front_style/img/dr.png">
                 </a>
               </h4> 
             </div>
             <div id="category" class="panel-collapse collapse in" style="background:#fafbfd">
               <div class="panel-body" style="margin-left:15px;">
                 <div id="allcategory" class="panel-collapse collapse in">
                   <a  id="nounderline"  href="<?php echo base_url();  ?> ">All category</a>
                  
                   </div><!--All category-->   
                     <div id="subcategory">
                       <div id="realsestate">
                         <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#allcategory" href="#realsestatelist">
                          &emsp;&nabla;<?php  echo $category_name->category_name;
                  $cat_name=str_replace(' ', '-',$category_name->category_name);  
              $cat_name=preg_replace('/[^A-Za-z0-9\-]/', '', $cat_name);
              $cat_name=preg_replace('/--+/', '-', $cat_name);
               
               $cat_name=strtolower($cat_name);
                   
               ?>
                         </a>
                         <div id="realsestatelist" class="panel-collapse collapse">
              <?php
              foreach($sub_categories as $sub_category){
                 $sub_cate_name=str_replace(' ', '-',$sub_category->sub_category_name);  
              $sub_cate_name=preg_replace('/[^A-Za-z0-9\-]/', '', $sub_cate_name);
              $sub_cate_name=preg_replace('/--+/', '-', $sub_cate_name);
               
               $sub_cate_name=strtolower($sub_cate_name);
              ?>
              <a id="nounderline" href="<?php echo base_url(),$sub_cate_name;?> ">&emsp;&emsp;&emsp;<?php echo $sub_category->sub_category_name; ?></a><br>
              <?php 
              }
              ?>
                         </div>
                       </div>          
                     </div>
                   </div><!--panel body-->      
                 </div>
               </div>
             </div>


             <div class="panel-group" id="pricecol" style="margin-bottom:15px;">
               <div class="panel panel-default" style="background:#fafbfd">
                 <div class="panel-heading" id="panel-price">
                   <h4 class="panel-title">
                      <div class="row">
                        <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#pricecol" style="padding-left:5%;padding-right:5%;color:black;" href="#pricerange">
                      Price<img style="width:20px;height:20px;margin-left:170px" src="<?php echo base_url();?>front_style/img/dr.png">
            
                        </a>
                    
                     </div>
                   </h4> 
                 </div>
               
               <div class="panel-collapse collapse in" id="pricerange">
                 <div class="panel-body">
                   <div class="row"> 
                     
                       <div class="col-sm-4" style="margin-left:20px;">
                         
                           <input type="text"  style="background-color:#f5f5f5;height:32px;width:90px;font-size: 12px;"  class="form-control" placeholder="Min" id="min" value="<?php if($min == 0 && $max ==0 ){} else{ echo $min;}  ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'min'">
                        
                      </div>
                      <div class="col-sm-4 " style="">
                        
                          <input type="text" style="background-color:#f5f5f5;height:32px;width:90px;font-size: 12px;" class="form-control" placeholder="Max" id="max" value="<?php if($min == 0 && $max ==0 ){} else{ echo $max;}  ?>"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'max'">
                            
                       
                      </div>
                      <div class="col-sm-1" >
                        
                          <button class="btn btn-default" style="background-color:#e5e5e5;color:white;height:25px;padding:0 5px;margin-left: 4px;margin-top: 4px;" type="button" onclick=minmax(<?php echo $category_id,',','"',$cat_name,'"'; ?>);> <i class="glyphicon glyphicon-chevron-right"></i></button>
                       
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
                  Seller Type<img style="width:20px;height:20px;margin-left:127px" src="<?php echo base_url();?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in" id="listseller">
                <div class="panel-body" style="margin-left:-4px;">
                   <div class="checkbox">
                     <label>
                       <input type="radio"  name="seller_type" <?php if($seller_type == 'any'){ echo 'checked="checked"'; }   ?> id="any" value="any"> Any
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio"  name="seller_type" <?php if($seller_type == 'individual'){ echo 'checked="checked"'; }   ?> id="individual" value="individual"> Individual
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio"  name="seller_type" <?php if($seller_type == 'business'){ echo 'checked="checked"'; }   ?> id="business" value="business"> Business
                     </label>
                   </div>
                </div>
              </div><!-- input-group -->
            </div>
          </div>
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
        <div class="col-sm-8" id="aalist" style="width:724px;padding:0;margin: 0;">
          <div class="jumbotron" id="aalisttop" style="width:724px;padding:0;">
            <div class="container">
      
              
              <div class="row">
                <div class="col-sm-12" >
                  <div class="row">
                    <div class="col-sm-7" style="margin: 0; padding: 0 0 0 10px;">
                      <div  class="pull-left"><p><strong><?php echo $category_name->category_name;  ?></strong>
            
              </p></div>
                    </div>
                    <div class="col-sm-5" style="margin: 0; padding: 0" >
                      <div class="left-inner-addon">
                        <i class="glyphicon glyphicon-search" style="padding:4px 0 0 6px;"></i>
                        <input id="local_search" style="background-color:#f5f5f5;padding-left: 40px;" type="text" class="form-control" placeholder="Search Within <?php echo $category_name->category_name; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Within <?php echo $category_name->category_name;  ?> '  " value="<?php  echo $local_search_key ; ?>">
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
                     <div class="col-sm-9" style="font-size:15px;padding-left: 0;margin-left: 0;">
                       <ul class="breadcrumb" style="margin:0;padding:0 0 0 10px;">  
                         <li>  
                           <a href="<?php  echo base_url(); ?>">All</a> 
                         </li><li class="active"><?php echo $category_name->category_name;  ?></li>  
                       </ul>
                     </div>
                     <!--<div class="col-sm-3">
                       <p class="pull-left" style="font-size:15px;padding:5px 0 0 0;">1000 Results</p>
                     </div>-->
                   </div>  
                 </div>
                 <div class="col-sm-4" style="font-size:15px;">
                   <div class="row pull-right" >
                 
                       <select class="form-control" id="sort_by" name="soty_by" style="display: inline-block;width:180px;">
                         
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
                    <img style="width:100%;height:90px;" src="<?php echo base_url();  ?>front_style/img/ad1.png"class="img-responsive" alt="Responsive image">
                  </div><!-- /.col-sm-12 -->
                </div>
        <div id="pagination" style="padding-left: 10px;">
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
    <script src="<?php echo base_url(); ?>front_style/js/bootstrap.js"> </script>
  
  <script>
    $('#local_search').keypress(function(e) {
         if(e.which == 13 || e.keyCode == 13) {
            var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        if(local_search_key == ""){
          
        }else{
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + 'insearch/' +  category_name + '/' +  local_search_key + '/' + category_id + '/' +0;
        }
        return false;
        }
    });
   </script>
  
  
  <script>
    function minmax(category_id,category_name){
      var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
      var local_search_key=$('#local_search').val();
      var min=$('#min').val();
      var max=$('#max').val();
      var sort_by=$('#sort_by').val();
      var located_in=$("input[type='radio'][name='located_in']:checked").val();
      located_in= located_in.split(" ");
      located_in= located_in.join("-");
      if(min == "" | max == ""){
        
      }else{
        local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
        window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;  
      }
      
    }
    
  </script>

  <script>
    $('#any').click(
      function(){
        var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + 0 + "/" + 0 + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;
        
      }else{
        local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0; 
      }
        
      }
    );
    
  </script>
  
  <script>
    $('#individual').click(
      function(){
        var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + 0 + "/" + 0 + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;
        
      }else{
        local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0; 
      }
      }
    );
    
  </script>
  <script>
    $('#business').click(
      function(){
        var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + 0 + "/" + 0 + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;
        
      }else{
        local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0; 
      }
      }
    );
    
  </script>
  <script>
    $('#sort_by').change(
      function(){
        var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + 0 + "/" + 0 + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;
        
        }else{
          local_search_key= local_search_key.split(" ");
            local_search_key=local_search_key.join("-");
            window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0; 
        }
      }
    );
  </script>
  <script>
    $("input[name='located_in']").click(
      function() {
        var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        var min=$('#min').val();
        var max=$('#max').val();
        var seller_type=$("input[type='radio'][name='seller_type']:checked").val();
        var sort_by=$('#sort_by').val();
        var located_in=$("input[type='radio'][name='located_in']:checked").val();
        located_in= located_in.split(" ");
        located_in= located_in.join("-");
        if(min == "" | max == ""){
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + 0 + "/" + 0 + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0;
        
        }else{
          local_search_key= local_search_key.split(" ");
            local_search_key=local_search_key.join("-");
            window.location.href=base_url + "insearch-filter/" +  category_name + '/' +  local_search_key + "/" + located_in + '/' + category_id + '/' + 0 +"/" + min + "/" + max + "/" + 0 + "/" + seller_type + "/" + sort_by + "/" + 0; 
        }
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
    <script>
      function follow(category_id,user_id,category_name){

        datas='category_id='+ category_id + '&user_id=' + user_id + '&category_name=' + category_name;
        $.ajax({
          type: "POST",    
          url: base_url + 'home/follow',
          data: datas,
          success: function(msg)
          {
            console.log;
            $('#follow').html(msg);
          }
        });
      }
    </script>
    
    <script>
      function unfollow(category_id,user_id,category_name){
        datas='category_id='+ category_id + '&user_id=' + user_id + '&category_name=' + category_name;
        $.ajax({
          type: "POST",    
          url: base_url + 'home/unfollow',
          data: datas,
          success: function(msg)
          {
            $('#follow').html(msg);
          }
        });
      }
    </script>
    
    <script>
    $('#local_search').keypress(function(e) {
         if(e.which == 13 || e.keyCode == 13) {
            var local_search_key=$('#local_search').val();
        var category_name="<?php echo $cat_name;    ?>";
        var category_id="<?php echo $category_id;    ?>";
        if(local_search_key == ""){
          
        }else{
          local_search_key= local_search_key.split(" ");
          local_search_key=local_search_key.join("-");
          window.location.href=base_url + 'insearch/' +  category_name + '/' +  local_search_key + '/' + category_id + '/' +0;
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
          if ($(window).scrollTop() > ($('#aalistmain').height() - 80)){
            $("#leftside-bar").css({"top": ($(window).scrollTop()) -300 + "px"});
          }
        }
      });
    </script>
<?php
  include('include/front_footer.php');
?>