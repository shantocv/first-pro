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
							<form class="form-horizontal" action="<?php echo base_url(); ?>state/add_states" method="post" >
									<fieldset>
										<div class="control-group">
											<div class="controls">
												<input type="text" name="state" placeholder="Enter the State Name">
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