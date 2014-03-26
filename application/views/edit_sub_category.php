<?php include "include/header.php"; ?>
		<div class="container leftmenucontainer">
			<div class="row leftmenurow">
				<?php include "include/leftmenu.php"; ?>
				<div class="span8 span8bigger">
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhead">Edit sub_category</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger dashboardhome"><i class="icon-home"></i>Home</div>
					</div>
					<div class="row leftalign">
						<div class="span8 span8bigger statistics">
							<span class="userrechead">Edit sub_category</span>
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
							<form class="form-horizontal" action="<?php echo base_url(); ?>sub_categorys/edit_info_submit" method="post" enctype="multipart/form-data" >
									<fieldset>
										<input type="hidden" name="sub_category_id" value="<?php echo $sub_category_datas[0]->sub_category_id; ?>">
										<div class="control-group">
											<label class="control-label" for="hename">sub_category Name </label>
											<div class="controls">
												<input type="text" name="sub_category_name" value="<?php echo $sub_category_datas[0]->sub_category_name; ?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="seo_title">Seo Title </label>
											<div class="controls">
												<textarea class="form-control" id="seo_title" name="seo_title" style="min-height:100px;"><?php echo $sub_category_datas[0]->seo_title; ?></textarea>								
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="seo_keyword">Seo Keyword </label>
											<div class="controls">
												<textarea class="form-control" id="seo_keyword" name="seo_keyword" style="min-height:100px;"><?php echo $sub_category_datas[0]->seo_keyword; ?></textarea>								
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="seo_desc">Seo Description </label>
											<div class="controls">
												<textarea class="form-control" id="seo_desc" name="seo_desc" style="min-height:100px;"><?php echo $sub_category_datas[0]->seo_desc; ?></textarea>								
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input type="submit" value="edit_sub_category" class="submitbutton">
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