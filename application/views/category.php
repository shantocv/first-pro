<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Category</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Category</span>
							<a href="<?php echo base_url();?>category/add_category"><span class="addnew">Add New</span></a>
						</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger tableheadcontainer">
							<span class="tablehead">
							Companies 
							<?php if($this->session->userdata('filter')) echo '- Search results for "'.$this->session->userdata('filter').'"';$this->session->unset_userdata('filter'); ?></span>
							<span class="searchbox">
								<form action="<?php echo base_url(); ?>category/filtered_categorys" method="post">
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
								<th>Category ID</th>
								<th>Category Name</th>
								<th>Seo Title</th>
								<th>Seo Keyword</th>
								<th>Seo Description</th>
								<th>Active / Inactive</th>
								<th>Options</th>
							  </tr>  
							</thead>  
							<tbody>
								<?php
									foreach($categories as $category){
										if($category->status==0) {
											$active= 'Inactive';
											$title= 'active';
										}else{
											$active= 'Active';
											$title= 'inactive';
										}
											
											echo '<tr>
													<td>'.$category->category_id.'</td>
													<td>'.$category->category_name.'</td>
													<td style="text-align:center">
														'.$category->seo_title.'
													</td>
													<td style="text-align:center">
														'.$category->seo_keyword.'
													</td>
													<td style="text-align:center">
														'.$category->seo_desc.'
													</td>
													<td style="text-align:center">
														<input type="button" id="'.$category->category_id.'"value="'.$active.'" onClick="change_active('.$category->category_id.');" title="Click to set '.$title.'" class="'.$active.'">
													</td>
													<td style="text-align:center">
															<input type="button" title="Click to edit company info" value="" onClick="edit_category(this,'.$category->category_id.',\''.$category->category_name.'\');" class="editbutton">
														<input type="button" class="deletebutton" title="Click to delete this company" value="" onClick="delete_category(this,'.$category->category_id.',\''.$category->category_name.'\')">
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
								url: base_url + 'category/change_active',
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
			function delete_category(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						var conf = confirm("Are you sure you want to delete '"+name+"' ?");
						
						if(conf == true){
								$.ajax({
									url: base_url + 'category/delete_category',
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
			
			function edit_category(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var conf = confirm("Are you sure you want to edit '"+name+"' ?");
						
						if(conf == true){
								window.location.href= base_url + "category/edit_category_info?id="+id;
						}
			}
		</script>
	</body>
</html>