<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Sub Types</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Sub Types</span>
							<a href="<?php echo base_url();?>sub_type/add_sub_types"><span class="addnew">Add New</span></a>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger tableheadcontainer">
							<span class="tablehead">
							Sub Types 
							<?php if($this->session->userdata('filter')) echo '- Search results for "'.$this->session->userdata('filter').'"';$this->session->unset_userdata('filter'); ?></span>
							<span class="searchbox">
								<form action="<?php echo base_url(); ?>sub_type/filtered_sub_types" method="post">
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
								<th>Sub Type ID</th>
								<th>Sub Type Name</th>
								<th>Type ID</th>
								<th>Options</th>
							  </tr>  
							</thead>  
							<tbody>
								<?php
									foreach($sub_types as $sub_type){
											
											echo '<tr>
													<td>'.$sub_type->sub_type_id.'</td>
													<td>'.$sub_type->sub_type_name.'</td>
													<td>'.$sub_type->type_id.'</td>
													<td style="text-align:center">
															<input type="button" title="Click to edit type info" value="" onClick="edit_sub_type(this,'.$sub_type->sub_type_id.',\''.$sub_type->sub_type_name.'\');" class="editbutton">
														<input type="button" class="deletebutton" title="Click to delete this type" value="" onClick="delete_sub_type(this,'.$sub_type->sub_type_id.',\''.$sub_type->sub_type_name.'\')">
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
			function delete_sub_type(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						var conf = confirm("Are you sure you want to delete '"+name+"' ?");
						
						if(conf == true){
								$.ajax({
									url: base_url + 'sub_type/delete_sub_type',
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
			
			function edit_sub_type(button,id,name) {
						var conf = confirm("Are you sure you want to edit '"+name+"' ?");
						
						if(conf == true){
								window.location.href="sub_type/edit_sub_type_info?id="+id;
						}
			}
		</script>
	</body>
</html>