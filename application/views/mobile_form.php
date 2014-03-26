<!doctype html>
<html>
	<head>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	   <script src="<?php echo base_url()?>js/site.js"></script>
	   <script src="<?php echo base_url()?>js/ajaxfileupload.js"></script>
	   <link href="<?php echo base_url()?>css/style.css" rel="stylesheet" />
	</head>
	<body>
		<h1>Upload File</h1>
		<form action="" method="post">
			<input type="file" name="userfile" id="userfile" size="20" />
			<input type="button" name="submit" id="submit" />
		</form>
		<div id="thumb">
			
		</div>
	</body>
</html>