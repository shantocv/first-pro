<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">category</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Add categorys</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>category/add_categories" method="post" >
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="category">Category Name </label>
											<div class="controls">
												<input type="text" name="category" id="category" placeholder="Enter the category Name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="seo_title">Seo Title </label>
											<div class="controls">
												<textarea class="form-control" id="seo_title" name="seo_title" style="min-height:100px;"></textarea>								
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