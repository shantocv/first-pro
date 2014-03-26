<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Sub Type</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Add Sub Types</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>sub_type/add_sub_type" method="post" >
									<fieldset>
										<div class="control-group">
											<div class="controls">
												<input type="text" name="sub_type" placeholder="Enter the Sub Type Name">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<select name="type_id">
													<option value=" ">Select Type</option>
													<?php
												foreach($types as $type){
												?>
												<option value="<?php echo $type->type_id;  ?>"><?php echo $type->type_name;   ?></option>
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