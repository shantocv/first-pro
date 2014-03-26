<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/login_page.css">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="">
        <p><input type="text" name="email" id="email" placeholder="Username or Email"></p>
        <p><input type="password" name="password" id="password"  placeholder="Password"></p>
		<div id="error">
			
		</div>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me 
          </label>
        </p>
        <p class="submit"><input type="submit" name="login" value="Login" id="login_button"></p>
      </form>
    </div>

    <div class="login-help">
      <p><a href="">Forgot your password?</a>
	  </p><p><a href="register">not a member yet? </a></p>
    </div>
  </section>
  <script>
		var base_url="<?php echo base_url(); ?>";
	</script>
  <script src="./js/jquery-1.10.1.min.js"></script>
  <script src=<?php echo base_url(),'js/core.js'; ?>></script>
</body>
</html>
