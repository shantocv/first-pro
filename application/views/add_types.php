<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">State</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Add States</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>types/add_type" method="post" >
									<fieldset>
										<div class="control-group">
											<div class="controls">
												<input type="text" name="type" placeholder="Enter the Type Name">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<select name="sub_category_id">
													<option value=" ">Select Sub Category</option>
													<?php
												foreach($sub_categories as $sub_category){
												?>
												<option value="<?php echo $sub_category->sub_category_id;  ?>"><?php echo $sub_category->sub_category_name;   ?></option>
												<?php
													
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