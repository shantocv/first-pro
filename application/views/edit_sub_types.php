<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Edit Sub Type</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Edit Sub Type</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>sub_type/edit_info_submit" method="post" enctype="multipart/form-data" >
									<fieldset>
										<input type="hidden" name="sub_type_id" value="<?php echo $sub_type_datas[0]->sub_type_id; ?>">
										<div class="control-group">
											<label class="control-label" for="hename">Sub Type Name </label>
											<div class="controls">
												<input type="text" name="sub_type_name" value="<?php echo $sub_type_datas[0]->sub_type_name; ?>">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input type="submit" value="edit_state" class="submitbutton">
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