<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">posts</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					
					<div class="row leftalign">
						<div class="span8 span8bigger tableheadcontainer">
							<span class="tablehead">
							Companies 
							<?php if($this->session->userdata('filter')) echo '- Search results for "'.$this->session->userdata('filter').'"';$this->session->unset_userdata('filter'); ?></span>
							<span class="searchbox">
								<form action="<?php echo base_url(); ?>post/filtered_posts" method="post">
									<input type="search" class="tablesearch" id="tablesearch" name="filter" placeholder="Search by post title">
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
								<th>post ID</th>
								<th>post Title</th>
								<th>Description</th>
								<th>Posted By</th>
								<th>Date</th>
								<th>Active / Inactvie</th>
								<th>Actions</th>
							  </tr>  
							</thead>  
							<tbody>
								<?php
									foreach($posts as $post){
										if($post->status==0) {
											$active= 'Inactive';
											$title= 'active';
										}else{
											$active= 'Active';
											$title= 'inactive';
										}
											
											echo '<tr>
													<td>'.$post->post_id.'</td>
													<td>'.$post->post_title.'</td>
													<td>'.$post->description.'</td>
													<td>'.$post->posted_by.'</td>
													<td>'.$post->date.'</td>
													<td style="text-align:center">
														<input type="button" id="'.$post->post_id.'"value="'.$active.'" onClick="change_active('.$post->post_id.');" title="Click to set '.$title.'" class="'.$active.'">
													</td>
													<td style="text-align:center">
														<input type="button" class="deletebutton" title="Click to delete this company" value="" onClick="delete_post(this,'.$post->post_id.',\''.$post->post_title.'\')">
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
								url: base_url + 'post/change_active',
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
			function delete_post(button,id,name) {
						var base_url = '<?php echo base_url(); ?>';
						var datastring = "&id="+id;
						var conf = confirm("Are you sure you want to delete '"+name+"' ?");
						
						if(conf == true){
								$.ajax({
									url: base_url + 'post/delete_post',
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
			
			function edit_post(button,id,name) {
						var conf = confirm("Are you sure you want to edit '"+name+"' ?");
						
						if(conf == true){
								window.location.href="post/edit_post_info?id="+id;
						}
			}
		</script>
	</body>
</html>