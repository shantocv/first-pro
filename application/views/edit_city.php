<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Edit City</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Edit City</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>cities/edit_info_submit" method="post" enctype="multipart/form-data" >
									<fieldset>
										<input type="hidden" name="city_id" value="<?php echo $city_datas[0]->city_id; ?>">
										<div class="control-group">
											<label class="control-label" for="hename">City Name </label>
											<div class="controls">
												<input type="text" name="city_name" value="<?php echo $city_datas[0]->city_name; ?>">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input type="submit" value="edit_city" class="submitbutton">
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