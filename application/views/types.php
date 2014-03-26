<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Types</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Types</span>
							<a href="<?php echo base_url();?>types/add_types"><span class="addnew">Add New</span></a>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger tableheadcontainer">
							<span class="tablehead">
							Types 
							<?php if($this->session->userdata('filter')) echo '- Search results for "'.$this->session->userdata('filter').'"';$this->session->unset_userdata('filter'); ?></span>
							<span class="searchbox">
								<form action="<?php echo base_url(); ?>types/filtered_types" method="post">
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
								<th>Type ID</th>
								<th>Type Name</th>
								<th>Seo Title</th>
								<th>Seo Keyword</th>
								<th>Seo Description</th>								
								<th>Sub Category ID</th>
								<th>Options</th>
							  </tr>  
							</thead>  
							<tbody>
										<?php
											$this->session->set_userdata('url',$this->uri->uri_string());
										?>
								<?php
									foreach($types as $type){
											
											echo '<tr>
													<td>'.$type->type_id.'</td>
													<td>'.$type->type_name.'</td>
													<td style="text-align:center">
														'.$type->seo_title.'
													</td>
													<td style="text-align:center">
														'.$type->seo_keyword.'
													</td>
													<td style="text-align:center">
														'.$type->seo_desc.'
													</td>
													<td>'.$type->sub_category_id.'</td>
													<td style="text-align:center">
															<input type="button" title="Click to edit type info" value="" onClick="edit_type(this,'.$type->type_id.',\''.$type->type_name.'\');" class="editbutton">
														<input type="button" class="deletebutton" title="Click to delete this type" value="" onClick="delete_type(this,'.$type->type_id.',\''.$type->type_name.'\')">
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
		/*function change_active(id) {
				var conf = confirm("Do you want to change the status?");
						
					if(conf == true){
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						$.ajax({
								url: base_url + 'city/change_active',
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
			}*/
			
			function delete_type(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						var conf = confirm("Are you sure you want to delete '"+name+"' ?");
						
						if(conf == true){
								$.ajax({
									url: base_url + 'types/delete_types',
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
			
			function edit_type(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var conf = confirm("Are you sure you want to edit '"+name+"' ?");
						
						if(conf == true){
								window.location.href=base_url + "types/edit_type_info?id="+id;
						}
			}
		</script>
	</body>
</html>