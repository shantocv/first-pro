<?php
	include('include/front_header.php');

?>

<div class="container" id="wrapper" style="width:100%;margin:0 auto;margin-top:115px;">    
        <div class="row" style="width:1024px;padding:0;margin:0 auto;margin-top:24px;margin-bottom:10px;" >
      
          <!-- Categories -->
          <div class="col-sm-3" id="leftside-bar" style="width:250px;margin:0 0 0 0;border:1px bold #eee;">
        
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
						  		 $name=$category_name->category_name;
						  		 $name=strtolower($name);
						  		 $name=explode(" ",$name);
						  		 $name=implode("_",$name);
						   ?>
                         </a>
                         <div id="realsestatelist" class="panel-collapse collapse">
						 	<?php
							foreach($sub_categories as $sub_category){
								 $title=str_replace(' ', '-',$sub_category->sub_category_name);  
							$title=preg_replace('/[^A-Za-z0-9\-]/', '', $title);
							$title=preg_replace('/--+/', '-', $title);
						   
						   $title=strtolower($title);
							?>
							<a id="nounderline" href="<?php echo base_url(),$title;?> ">&emsp;&emsp;&emsp;<?php echo $sub_category->sub_category_name; ?></a><br>
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
               <div class="panel panel-default">
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
                         
                           <input type="text"  style="background-color:#f5f5f5;height:25px;width:90px;"  class="form-control" placeholder="Min" id="min">
                        
                      </div>
                      <div class="col-sm-4 " style="">
                        
                          <input type="text" style="background-color:#f5f5f5;height:25px;width:90px;" class="form-control" placeholder="Max" id="max">
                            
                       
                      </div>
                      <div class="col-sm-1" >
                        
                          <button class="btn btn-default" style="background-color:#012346;color:white;height:25px;padding:0 5px;" type="button" onclick=minmax(<?php echo $category_id,',','"',$name,'"'; ?>);> <i class="glyphicon glyphicon-chevron-right"></i></button>
                       
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
                  Seller Type<img style="width:20px;height:20px;margin-left:125px" src="<?php echo base_url();?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in" id="listseller">
                <div class="panel-body" style="margin-left:15px;">
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type"> Any
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type"> Individual
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="radio" name="seller_type"> Business
                     </label>
                   </div>
                </div>
              </div><!-- input-group -->
            </div>
          </div>

			<!--types-->
			<br />
			
			<div class="panel-group" id="sellertype">
              <div class="panel panel-default" style="background:#fafbfd">
                <div class="panel-heading" id="panel-seller">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"  data-parent="#sellertype" href="#listseller">
                  Type<img style="width:20px;height:20px;margin-left:165px" src="<?php echo base_url();?>front_style/img/dr.png">
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in" id="listseller">
                <div class="panel-body" style="margin-left:15px;">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Any
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Individual
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Business
                     </label>
                   </div>
                </div>
              </div><!-- input-group -->
            </div>
          </div>
            
        </div><!-- Categories -->
        
        
        <!-- AD List -->
        <div class="col-sm-8" id="adlist">
          <div class="jumbotron" id="adlisttop" style="width:750px;padding:0">
            <div class="container">
			<div class="row">
                <div class="container" style="background:#fff8db;padding:0 10px 20px 10px">
                  <div class="row">
                    <p style="font-size:15px;font-weight:bold;color:blue;margin: 10px 0 10px 15px">Select Your State</p>
                  </div>
                  <div class="row">
                    <div class="col-xs-3">
					<?php
						for($i=0;$i<7;$i++){
							
							
					?>
					<p style="margin:0;line-height:80%"><a id="nounderline" style="font-size:12px;color:black;" href="<?php echo base_url(),'ad/', $name,'/',$category_id,'/',$states[$i]->state_id;?>"><?php echo $states[$i]->state_name; ?> </a></p>
					<?php		
						}
					?>
                  
                    </div>
                    <div class="col-xs-3">
                      <?php
						for($i=7;$i<14;$i++){
							
					?>
					<p style="margin:0;line-height:80%"><a id="nounderline" style="font-size:12px;color:black;" href="<?php echo base_url(),'ad/', $name,'/',$category_id,'/',$states[$i]->state_id;?>"><?php echo $states[$i]->state_name; ?> </a></p>
					<?php		
						}
					?>
                    </div>
                    <div class="col-xs-3">
                      <?php
						for($i=14;$i<21;$i++){
							
					?>
					<p style="margin:0;line-height:80%"><a id="nounderline" style="font-size:12px;color:black;" href="<?php echo base_url(),'ad/', $name,'/',$category_id,'/',$states[$i]->state_id;?>"><?php echo $states[$i]->state_name; ?> </a></p>
					<?php		
						}
					?>
                    </div>
                    <div class="col-xs-3">
                      <?php
						for($i=21;$i<28;$i++){
							
					?>
					<p style="margin:0;line-height:80%"><a id="nounderline" style="font-size:12px;color:black;" href="<?php echo base_url(),'ad/', $name,'/',$category_id,'/',$states[$i]->state_id;?>"><?php echo $states[$i]->state_name; ?> </a></p>
					<?php		
						}
					?>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <!--div class="col-sm-6"-->  
                  <ul class="breadcrumb" style="font-size:15px;margin-bottom:5px;">  
                    <li>  
                     <a href="<?php echo base_url(),$name;?>">India</a> 
                    </li>    
                  </ul>  
                        
                <!--/div-->
              </div>
              <div class="row">
                <div class="col-sm-12" style="m">
                  <div class="row">
                    <div class="col-sm-6">
                      <div  class="pull-left"><p><strong><?php echo $category_name->category_name;  ?></strong>
					  <?php
					  if($this->session->userdata('logged_in')){
					  	if($follow == 0){
					  ?>
					  <span id="follow">
					  	<button id="follow_button" onclick="follow(<?php echo $category_id,',',$this->session->userdata('user_id'); ?>)" class="btn btn-small">Follow</button>
					  </span>
					  
					  <?php	
					  	}else{
					  ?>
					  <span id="follow">
					  <button id="unfollow_button" onclick="unfollow(<?php echo $category_id,',',$this->session->userdata('user_id'); ?>)" class="btn btn-small">Unfollow</button>
					  </span>
					  <?php		
						}
					  }
					  
					  	?>
					    </p></div>
                    </div>
                    <div class="col-sm-6" >
                      <div class="left-inner-addon">
                        <i class="glyphicon glyphicon-search" style="padding:4px 0 0 6px;"></i>
                        <input style="background-color:#f5f5f5;" type="text" class="form-control" placeholder="Search Within <?php echo $category_name->category_name;  ?>">
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
                     <div class="col-sm-9" style="font-size:15px;">
                       <ul class="breadcrumb" style="margin:0;padding:0 0 0 5px">  
                         <li>  
                           <a href="<?php  echo base_url(); ?>">All</a> 
                         </li><li class="active"><?php echo $category_name->category_name;  ?></li>  
                       </ul>
                     </div>
                     <div class="col-sm-3">
                       <p class="pull-left" style="font-size:15px;padding:5px 0 0 0;">1000 Results</p>
                     </div>
                   </div>  
                 </div>
                 <div class="col-sm-4" style="font-size:15px;">
                   <div class="row pull-right" style="padding-right:20px;">
                       <span>Sort by</span>
                       <select>
                         <option>price min to max</option>
                         <option>price max to min</option>
                         <option>new-old</option>
                       </select>
                    </div>
                  </div>
                            
                </div><!-- /.col-sm-12 -->
                
              </div>
              <hr>
			  <div class="row" id="adcontainer" style="background:#fff; padding:10px;">
                  <div class="col-sm-12" >
                    <img style="width:100%;height:90px" src="<?php echo base_url();  ?>front_style/img/ad1.png"class="img-responsive" alt="Responsive image">
                  </div><!-- /.col-sm-12 -->
                </div>
              <div class="col-sm-12" id="adlistmain" >
                
           		<?php
				foreach($ads as $ad){
				?>
				<hr id="big"> 
                <div class="row" id="adcontainer" style="background:#edebec">
				<?php 
					$name=$ad->post_title;
			  		 $name=strtolower($name);
			  		 $name=explode(" ",$name);
			  		 $name=implode("_",$name);
				?>
				<a href="<?php echo base_url(),'ad_details/',$name,'/',$ad->post_id;?> ">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:160px;height:115px;" src="
						<?php 
							if($ad->ext == ""){
								echo base_url(),'uploads/default.jpg';
							}else{
								echo base_url(),'uploads/',$ad->id,'_thumb.',$ad->ext;
							}
						
						  ?>" class="img-responsive" alt="Responsive image">
                      </div>
					  
					  	 <div class="col-sm-7">
                        <div class="row">
                          <p id="adtitle"><strong><?php echo $ad->post_title;  ?></strong>
						  	<?php
								$old_date=new DateTime($ad->date);
								$diff_time = $curret_date->diff($old_date);
								if($diff_time ->format('%a') >= $ad->expire ){
									echo 'expired';	
								}
							
							?>
						  
						  </p>
                        </div>
                        <div class="row">
                          <p style="font-size:13px;color:#c0bebf;margin-left:15px"><?php echo $ad->description;  ?></p>
                        </div>
                        <hr id="small">
                        <div class="row">
                          <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px"><?php echo $ad->price;  ?></p>
                          <p class="pull-right" style="font-size:15px;margin:0 15px 0 0"><?php echo $ad->date;  ?></p>
                        </div>
                      </div>
					  </a>
                      <div class="col-sm-2" id="adbt">
                        <div class="row">
                          <button class="btn btn-lg" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                        </div>
                      </div>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
				<?php	
				}
				?>
				
                
                
                 </div>
              </div><!-- container -->
            </div><!-- jumbotron -->
            
            
            
        </div><!-- AD List -->
         
       
      </div> <!-- row -->
      
     
      
    </div> <!-- container -->
    </div>
	 <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo base_url(); ?>style/js/bootstrap.min.js></script>
	<script>
		var base_url="<?php echo base_url(); ?>";
    </script>
	<!--<script>
		function minmax(category_id){
			var min=$('#min').val();
			var max=$('#max').val();
			var datas='min='+ min + '&max=' + max + '&category_id=' + category_id;
			$.ajax({
				type: "POST",    
				url: base_url + 'home/minmax',
				data: datas,
				success: function(msg)
				{
					$('#adlistmain').html(msg);
				}
			});
			
		}
	</script>-->
	<script>
		function minmax(category_id,category_name){
			var min=$('#min').val();
			var max=$('#max').val();
			if(min == "" | max == ""){
				
			}else{
				window.location.href=base_url + "filter/" + category_name + "/"+ category_id +"/" + min + "/" + max + "/" + 0 ;	
			}
			
		}
		
	</script>
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
                          return $(this).parent().find('.reg').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.regcont').html();
                      }
                  });
                  
                    
                   
                    
         });
        </script>
		<script>
			function follow(category_id,user_id){
				
				datas='category_id='+ category_id + '&user_id=' + user_id;
				$.ajax({
					type: "POST",    
					url: base_url + 'home/follow',
					data: datas,
					success: function(msg)
					{
						$('#follow').html(msg);
					}
				});
			}
		</script>
		
		<script>
			function unfollow(category_id,user_id){
				datas='category_id='+ category_id + '&user_id=' + user_id;
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
	
<?php
	include('include/front_footer.php');
?>