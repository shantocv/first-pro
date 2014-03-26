<?php
include('include/front_header.php');

?>
<div class="container " id="wrapper" style="margin:0 auto;margin-top:25px;">
	<div class="row" style="width:998px;padding:0;margin:0 auto;padding: 0;" >

		<!-- Categories -->
		<div class="col-xs-3 pull-left" id="leftside-bar" style="margin:0;padding: 0;">
			<div style="background-color: rgb(248, 245, 240);width:254px;height:122px;border:1px solid #e5e5e5;">
				<div style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
					<a  href="<?php echo base_url(),'account' ; ?>" ><strong><span style="font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/adsfeed2.png">&emsp;Live Feeds</span></strong></a>
				</div>

				<div  style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
					<a  href="<?php echo base_url(),'manage-ads' ; ?>" ><strong><span style="font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/manageads1.png">&emsp;Manage Ads</span></strong></a>
				</div>
				<div style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
					<a  href="<?php echo base_url(),'messages'; ?>" ><strong><span style="font-size:16px"><img src="<?php echo base_url(); ?>front_style/img/messages1.png">&emsp;Messages</span></strong></a>
				</div>
			</div> 
		</div>
		<!-- Categories -->


		<!-- AD List -->
		<div class="col-xs-8" id="aalist">
			<div class="jumbotron" id="aalisttop" style="width:694px;min-height:500px;padding:0;border-radius:5px;">
				<div class="container" style="padding:0;">
					<div class="row" style="border: 1px solid #e5e5e5;padding-bottom:10px;">
						<div class="col-xs-12">
							<div class="row" style="height:45px;font-size:15px;">
								<ul class="nav nav-tabs" style="background:#e5e5e5;border-radius:0;">
									<li class="active" id="activeli" style="padding:0 20px 0 20px;">
										<a id="navli" href="#activeads" data-toggle="tab">Active Ads</a>
									</li>
									<li style="padding:0 20px 0 20px">
										<a  id="navli" href="#pendingads" data-toggle="tab">Expired Ads</a>
									</li>

								</ul>
								<div class="col-xs-12">
									<div class="row">
										<div class="container">
											<div class="tab-content" >
												<div id="activeads" class="tab-pane active" style="padding: 10px 0px 10px 0px;">
													<div class="container" style="padding-left:0px;padding-right:0px;">
														<!-Active Ads -->
														<?php
														foreach($ads as $ad){
															$old_date=new DateTime($ad->date);
															$diff_time = $curret_date->diff($old_date);
															if($diff_time ->format('%a') < $ad->expire ){
																?>
																<div class="row" id="aacontainer<?php echo $ad->post_id; ?>" style="background:#edebec;margin:10px;padding: 10px 10px 4px 10px ;">
																	<?php 
																	$post_name=str_replace(' ', '-',$ad->post_title);  
																	$post_name=preg_replace('/[^A-Za-z0-9\-]/', '', $post_name);
																	$post_name=preg_replace('/--+/', '-', $post_name);

																	$post_name=strtolower($post_name);
																	?>
																	<a href="<?php echo base_url(),$post_name,'/',$ad->post_id;?> ">
																		<div class="col-xs-12" >
																			<!--div class="container"-->
																			<div class="col-xs-3" id="adim">
																				<img style="width:140px;height:90px;margin-left: -12px;" src="
																				<?php 
																				if($ad->ext == ""){
																					echo 'http://uploads.zeromaze.com/uploads/def_thumb.png';
																				}else{
																					echo 'http://uploads.zeromaze.com/uploads/',$ad->id,'_thumb.',$ad->ext;
																				}

																				?>"

																				class="img-responsive" alt="Responsive image">
																			</div>
																			<div class="col-xs-7" style="padding-left:0px;">
																				<div class="row" style="margin-left:0px;">
																					<p id="adtitle">
																						
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
																						
																					</p>
																				</div>
																				<div class="row" style="margin-left:0px;color: black;font-size: 13px;color:grey;">
																					<?php 
																					if(strlen($ad->description) > 70){
																						$str =  substr($ad->description, 0, 70).'...';
																						$str = strip_tags($str);
																						$str = strtolower($str);
																						echo $str;  
																					}else{
																						echo $ad->description;
																					}

																					?>
																				</div>
																				<hr id="small">
																				<div class="row">
																					<p class="pull-left" style="font-size:18px;margin-left:15px;color:#166fa7;font-family:Arial,Helvetica,sans-serif;">&#8377; <?php echo $ad->price;  ?></p>
																					<p class="pull-right" style="font-size:13px;margin:0 15px 0 0;color:grey"><?php echo date('M - j - Y ', strtotime($ad->date));  ?></p>
																				</div>
																			</div>

																			<div class="col-xs-2" id="borderleft">
																				<div class="row" style="color:#1570a5;margin:10px;">
																					<a id="edit_ad" onclick="edit_ad(<?php echo $ad->post_id;  ?>)" href="<?php echo base_url(),'edit-ad-details/',$ad->post_id;  ?>">Edit</a>
																				</div>
																				<div class="row" style="color:#1570a5;margin:10px;">
																					<a id="delete_ad" onclick="delete_ad(<?php echo $ad->post_id;  ?>)" href="javascript:void(0);">Delete</a>
																				</div>
																			</div>





																			<!--/div-->
																		</div><!-- /.col-xs-12 -->

																	</div>
																	<hr id="big"> 
																</a>
																<?php
															}		
														}
														?>





													</div>
												</div>
												<div id="pendingads" class="tab-pane">
													<!-Pending Ads -->
													<div class="container">
														<?php
														foreach($ads as $ad){
															$old_date=new DateTime($ad->date);
															$diff_time = $curret_date->diff($old_date);
															if($diff_time ->format('%a') >= $ad->expire ){
																?>
																<div class="row" id="aacontainer<?php echo $ad->post_id; ?>" style="background:#edebec;margin:10px;">
																	<?php
																	$post_name=str_replace(' ', '-',$ad->post_title);  
																	$post_name=preg_replace('/[^A-Za-z0-9\-]/', '', $post_name);
																	$post_name=preg_replace('/--+/', '-', $post_name);

																	$post_name=strtolower($post_name); 
																	
																	?>
																	<a href="<?php echo base_url(),$post_name,'/',$ad->post_id;?> ">
																		<div class="col-xs-12" >
																			<!--div class="container"-->
																			<div class="col-xs-3" id="adim">
																				<img style="width:160px;height:115px;margin-left: -12px;" src="
																				<?php 
																				if($ad->ext == ""){
																					echo 'http://uploads.zeromaze.com/uploads/default.jpg';
																				}else{
																					echo 'http://uploads.zeromaze.com/uploads/',$ad->id,'_thumb.',$ad->ext;
																				}

																				?>"

																				class="img-responsive" alt="Responsive image">
																			</div>
																			<div class="col-xs-7">
																				<div class="row">
																					<p id="adtitle">
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
																					</p>
																				</div>
																				<div class="row" style="margin-left:0px;color: black;font-size: 15px;">
																					<?php 
															                          if(strlen($ad->description) > 70){
															                             $str =  substr($ad->description, 0, 70).'...';
															                             $str = strip_tags($str);
															                             $str = strtolower($str);
															                             echo $str;  
															                          }else{
															                            echo $ad->description;
															                          }
															                          
															                         ?>
																				</div>
																				<hr id="small">
																				<div class="row">
																					<p class="pull-left" style="font-size:18px;margin-left:15px;font-family:Arial,Helvetica,sans-serif;">&#8377; <?php echo $ad->price;  ?></p>
																					<p class="pull-right" style="font-size:15px;margin:0 15px 0 0"><?php echo date('M - j - Y ', strtotime($ad->date));  ?></p>
																				</div>
																			</div>

																			<div class="col-xs-2" id="borderleft">
																				<div class="row" style="color:#1570a5;margin:10px;">
																					<a id="edit_ad" onclick="edit_ad(<?php echo $ad->post_id;  ?>)" href="<?php echo base_url(),'edit-ad-details/',$ad->post_id;  ?>">Edit</a>
																				</div>
																				<div class="row" style="color:#1570a5;margin:10px;">
																					<a id="delete_ad" onclick="delete_ad(<?php echo $ad->post_id;  ?>)" href="javascript:void(0);">Delete</a>
																				</div>
																			</div>





																			<!--/div-->
																		</div><!-- /.col-xs-12 -->

																	</div>
																	<hr id="big"> 
																</a>
																<?php
															}		
														}
														?>  

													</div>
												</div>


											</div>
										</div>

									</div><!-- /.col-xs-12 -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- container -->
			</div><!-- jumbotron -->       
		</div><!-- AD List -->
	</div> <!-- row --> 
</div> <!-- container -->
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
<script>
	function delete_ad(post_id){
		var datas='post_id='  + post_id;
		var id='#aacontainer' + post_id;
		if (confirm("Are you sure?")) {
          // your deletion code
          $.ajax({
          	type: "POST",    
          	url: base_url + 'account/delete_ad',
          	data: datas,
          	success: function(msg)
          	{
          		alert(msg);
          		if(msg == 0){
          			alert('some error occured');
          		}else if(msg == 1){
          			$(id).remove();
          		}
          	}

          });
        }
        return false;

      }
    </script>
    <?php
    include('include/front_footer.php');
    ?>