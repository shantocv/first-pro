<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">sub_category</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Add sub_category</span>
						</div>
					</div>
					<?php if(isset($company_added)) { ?>
					<div class="row leftalign">
						<div class="span8 span8bigger company_added">
							<?php echo $company_added; ?>
						</div>
					</div>
					<?php } ?>
					<div class="row leftalign">
						<div class="span8 span8bigger addcompanyform">
							<form class="form-horizontal" action="<?php echo base_url(); ?>sub_category/add_sub_categorys" method="post" >
									<fieldset>
										<div class="control-group">
											<div class="controls">
												<input type="text" name="sub_category" placeholder="Enter the sub_category Name">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<select name="category_name">
													<option value="">Select Category</option>
													<?php
														foreach($category_names as $raw){
															echo '<option value=',$raw->category_id,'>',$raw->category_name,'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input type="submit" value="add"  class="submitbutton">
											</div>
										</div>
									</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "include/footer.php"; ?>
	</body>
</html>