<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Cities</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Cities</span>
							<a href="<?php echo base_url();?>cities/add_city"><span class="addnew">Add New</span></a>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger tableheadcontainer">
							<span class="tablehead">
							Companies 
							<?php if($this->session->userdata('filter')) echo '- Search results for "'.$this->session->userdata('filter').'"';$this->session->unset_userdata('filter'); ?></span>
							<span class="searchbox">
								<form action="<?php echo base_url(); ?>cities/filtered_cities" method="post">
									<input type="search" class="tablesearch" id="tablesearch" name="filter" placeholder="Search">
									<input type="submit" value="GO" class="gobutton">
								</form>
							</span>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger">
							<table class="table table-striped usertable">  
							<thead>  
							  <tr>    
								<th>City ID</th>
								<th>City Name</th>
								<th>Active / Inactive</th>
								<th>Options</th>
							  </tr>  
							</thead>  
							<tbody>
								<?php
									foreach($cities as $city){
										if($city->status==0) {
											$active= 'Inactive';
											$title= 'active';
										}else{
											$active= 'Active';
											$title= 'inactive';
										}
											
											echo '<tr>
													<td>'.$city->city_id.'</td>
													<td>'.$city->city_name.'</td>
													<td style="text-align:center">
														<input type="button" id="'.$city->city_id.'"value="'.$active.'" onClick="change_active('.$city->city_id.');" title="Click to set '.$title.'" class="'.$active.'">
													</td>
													<td style="text-align:center">
															<input type="button" title="Click to edit company info" value="" onClick="edit_city(this,'.$city->city_id.',\''.$city->city_name.'\');" class="editbutton">
														<input type="button" class="deletebutton" title="Click to delete this company" value="" onClick="delete_city(this,'.$city->city_id.',\''.$city->city_name.'\')">
													</td>
												</tr>';
										}
								?>  
							</tbody>  
						  </table>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger paginationcontainer">
							<?php echo $links; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "include/footer.php"; ?>
		<script>
			function change_active(id) {
				var conf = confirm("Do you want to change the status?");
						
					if(conf == true){
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						$.ajax({
								url: base_url + 'cities/change_active',
								data: datastring,
								type: 'post',   
								success: function(data) {
									if(data==1) {
										$('#'+id).val('Active');
										$('#'+id).attr('title', 'Click to set inactive');
										$('#'+id).removeClass('Inactive');
										$('#'+id).addClass('Active');
									}
									else {
										$('#'+id).val('Inactive');
										$('#'+id).attr('title', 'Click to set active');
										$('#'+id).removeClass('Active');
										$('#'+id).addClass('Inactive');
									}
								}
						});
				}
			}
			function delete_city(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						var conf = confirm("Are you sure you want to delete '"+name+"' ?");
						
						if(conf == true){
								$.ajax({
									url: base_url + 'city/delete_city',
									data: datastring,
									type: 'post',
									success: function(data) {
										if(data==1)
											$(button).parent().parent().remove();
										else
											$('#'+id).val('Set Active');
									}
								});
						}
			}
			
			function edit_city(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var conf = confirm("Are you sure you want to edit '"+name+"' ?");
						
						if(conf == true){
								window.location.href=base_url + "cities/edit_city_info?id="+id;
						}
			}
		</script>
	</body>
</html>