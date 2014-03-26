<div class="span3 leftmenucolumn">  
					<div class="accordion" id="leftMenu">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle <?php if($active=='dashboard') echo "active"; ?>" data-parent="#leftMenu" href="<?php echo base_url();?>dashboard">
									  <i class="icon-home"></i> Dashboard
								</a>
							</div>
						</div>
						
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle dropable active" data-toggle="collapse" data-parent="#leftMenu" href="#collapseThree">
									<i class="icon-edit"></i> User Records
								</a>
							</div>
							<div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
								<div class="accordion-inner">
									<ul>
										<li><a href="<?php echo base_url(); ?>user_records/getInnerUserFamily" class="<?php if(isset($sub_active)) if($sub_active=='user_family') echo "active_sub_menu"; ?>">Family</a></li>
										<li><!-- <a href="<?php echo base_url(); ?>user_records/getInnerUserFriends" class="<?php if(isset($sub_active)) if($sub_active=='user_friends') echo "active_sub_menu"; ?>"> -->Friends<!-- </a> --></li>
										<li><!-- <a href="<?php echo base_url(); ?>user_records/getInnerUserMessages" class="<?php if(isset($sub_active)) if($sub_active=='user_messages') echo "active_sub_menu"; ?>"> -->Messages<!-- </a> --></li>
										<li><a href="<?php echo base_url(); ?>user_records/getInnerUserEvaluations" class="<?php if(isset($sub_active)) if($sub_active=='user_evals') echo "active_sub_menu"; ?>">Evaluations</a></li>
										<li><!-- <a href="<?php echo base_url(); ?>user_records/getInnerUserRegistries" class="<?php if(isset($sub_active)) if($sub_active=='user_registries') echo "active_sub_menu"; ?>"> -->Registries<!-- </a> --></li>
									</ul>                 
								</div>
							 </div>
						</div>
					</div>
				</div>
		<script>
			$(document).ready(function() {
			
				$('.active').find('i').addClass('icon-white');
				
				$('.active').parent().parent().find('.accordion-body').css("height","auto");
				$('.active').parent().parent().find('.accordion-body').addClass('in');
				
				$('.accordion-toggle').click(function() {
					if($(this).hasClass('active')) {
						$(this).removeClass('active');
						$('.accordion-toggle:not(.active) i').removeClass('icon-white');
						$(this).find('i').addClass('icon-white');
					}
					else {
						$('.active').removeClass('active');
						$(this).addClass('active');
						$('.accordion-toggle:not(.active) i').removeClass('icon-white');
						$(this).find('i').addClass('icon-white');
					}
				});
				$('.accordion-toggle').hover(function() {
					$('.accordion-toggle:not(.active) i').removeClass('icon-white');
					$(this).find('i').addClass('icon-white');
				});
				$('.accordion-toggle').mouseleave(function() {
					if(!$(this).hasClass('active'))
						$('.accordion-toggle:not(.active) i').removeClass('icon-white');
				});
				
			});
		</script>