<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/login_page.css">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Register</h1>
      <form method="post" action="">
        <p><input type="text" name="email" id="email" placeholder="Email"></p>
        <p><input type="password" name="password" id="password"  placeholder="Password"></p>
		<div id="error">
			
		</div>
        <p class="submit"><input type="submit" name="register" value="Register" id="register_button"></p>
      </form>
    </div>
  </section>
  <script>
		var base_url="<?php echo base_url(); ?>";
	</script>
  <script src="./js/jquery-1.10.1.min.js"></script>
  <script src=<?php echo base_url(),'js/core.js'; ?>></script>
</body>
</html>
