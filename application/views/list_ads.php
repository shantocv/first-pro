<?php
	echo '<h2>ads</h2>';
	foreach($ads as $ad){
		echo $ad->post_title;
		echo '<br/>';
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href=<?php echo base_url();?>front_end/css/bootstrap.css>
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
                background-color: #f8f5f0;
                font-family: Segoe UI;
            }
        </style>
        <!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
        <link rel="stylesheet" href=<?php echo base_url();?>front_end/css/main.css>
        <link rel="stylesheet" type="text/css" href=<?php echo base_url();?>front_end/css/sticky-footer.css>
        <script src=<?php echo base_url();?>front_end/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar  navbar-fixed-top" style="background-color:#012346 !important">
      <div class="container">
            <a href="#" class="btn btn-lg btn-link pull-right"><span style="color:white">Sign in/Register</span></a>           
            
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron"  style="background-color:white !important;-webkit-box-shadow: 0px 1px 0px 1px #e4e6eb;-moz-box-shadow: 0px 1px 0px 1px #e4e6eb;box-shadow: 0px 1px 0px 1px #e4e6eb;padding-bottom:25px;padding-top:25px;">
      <div class="container">
        <div class="col-lg-3 col"><img style="width:225px;height:75px" src=<?php echo base_url();?>front_end/img/yuplee_logo.png></div>
        <div class="col-lg-6 col-lg-offset-1">
          <div class="input-group">
            <input style="background-color:#f5f5f5" type="text" class="form-control" placeholder="What are you searching for">
            <span class="input-group-btn">
              <button class="btn btn-default" style="background-color:#012346;color:white" type="button">&emsp;Search&emsp;</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-1 col-lg-offset-0">
          <button class="btn btn-lg" style="background-color:gold"><strong>Post Your Ad</strong></button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="rows">
        <div class="box" style="background-color:#fff">
          <div class="box-header" data-original-title="" style="background-color:#2d3741">
            <h5 style="color:#fff">&emsp;Browse by Category</h5>
          </div>
          <!-- <div class="box-content"> -->
          <div>
            <ul class="nav nav-stacked col-lg-3" >
				<?php
					foreach($sub_categories as $sub_category){
						$name=strtolower($sub_category->sub_category_name);
						$name=explode(" ",$name);
						$name=implode("_",$name);
				?>
				<li class="liborder">
                	<a href="<?php echo base_url(),'sub_category/',$name,'/',$sub_category->sub_category_id;  ?> "   id="option1"><strong><span style="color:black;font-size:16px"><i class="glyphicon glyphicon-phone"></i>&emsp;<?php echo $sub_category->sub_category_name;  ?></span></strong></a>
               </li>
				
				<?php
					}
				?>
            </ul>
          </div>
          <!-- </div> -->
        </div>
      </div>
      <!-- <div id="onhoverdiv" class="rows" style="visibility:hidden;">
        asdalksdj
      </div> -->

      <div class="rows">
        <div class="col-sm-9 col-lg-9">
          <div class="row">
            <div class="box">
              <div class="box-header" data-original-title="" style="background-color:#f8efc7">
                <h5 style="color:#000">&emsp;Sponsers</h5>
              </div>
              <div class="box-content">
                <img src=<?php echo base_url();?>front_end/img/controls.png><img src=<?php echo base_url();?>front_end/img/controls.png><img src=<?php echo base_url();?>front_end/img/controls.png>
              </div>
            </div>
 
          </div>
        </div>
        <div class="col-sm-2 col-lg-2 col-lg-offset-1" style="background-color:#f5f5f5;min-height:625px;border:1px solid #000">
          
        </div>
      </div>

      <div class="clearfix"></div>
      
    </div> <!-- /container -->
    <div id="footer">
      <div class="container">
        <center><p class="text-muted"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></p></center>
        <center><a href="#"><img src=<?php echo base_url();?>front_end/img/fb.png style="width:30px;height:30px"></a>&nbsp;<a href="#"><img src=<?php echo base_url();?>front_end/img/tw.png style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src=<?php echo base_url();?>front_end/img/g+.jpg style="width:20px;height:20px"></a></center>
      </div>
    </div>
        <script src=<?php echo base_url();?>front_end/js/vendor/jquery-1.10.1.min.js"></script>
        <script src=<?php echo base_url();?>front_end/js/vendor/bootstrap.js></script>
        <script type="text/javascript">
          $("#onhoverdiv, #option1").on("mouseenter", function() {
            $("#onhoverdiv").show();
            $('#start').hide();
            //$('#option1').css("border-right", "none");
            document.getElementById("#option1").style.borderRight = "none";
          }).on("mouseleave", function() {
          $("#onhoverdiv").hide();
          $('#start').show();
          });
// $(document).on('hover', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
//     e.preventDefault()
//     $(this).trigger('click');
//   })
        </script>
        <script src=<?php echo base_url();?>front_end/js/main.js></script>
    </body>
</html>
