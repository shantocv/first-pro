<?php
	include('include/front_header.php');

?>
     <div class="container " id="wrapper" style="margin:0 auto;margin-top:25px;">
            <div class="row" style="width:998px;padding:0;margin:0 auto;" >
      
              <!-- Categories -->
         <div class="col-xs-2"  style="margin:0;padding: 0;">
           <div style="background-color: rgb(248, 245, 240);width:254px;height:122px;border:1px solid #e5e5e5;">
              <div style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
                <a  href="<?php echo base_url(),'account'; ?>" ><strong><span style="font-size:16px"><img src="<?php echo base_url();  ?>front_style/img/adsfeed2.png">&emsp;Live Feeds</span></strong></a>
              </div>
              
              <div style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
                <a  href="<?php echo base_url(),'manage-ads'; ?>" ><strong><span style="font-size:16px"><img src="<?php echo base_url();  ?>front_style/img/manageads1.png">&emsp;Manage Ads</span></strong></a>
              </div>
              <div  style="background-color: rgb(248, 245, 240);width:252px;height:40px;border-bottom:1px solid white;padding:3px 0px 10px 10px;">
                  <a  href="" ><strong><span style="font-size:16px"><img src="<?php echo base_url();  ?>front_style/img/messages1.png">&emsp;Messages</span></strong></a>
              </div>
            </div> 
         </div>
         <!-- Categories -->
        
        
              <!-- AD List -->
              <div class="col-xs-10" id="aalist">
                <div class="jumbotron" id="aalisttop" style="min-height:730px;padding:0">
                  <div class="container">
                    <div class="row" style="border: 1px solid #e5e5e5;">
                      <div class="col-xs-12" style="border-radius: 5px;" id="remaining_checkboxes">
                        <div class="row" style="height:40px;background:#e5e5e5;border-radius:0;">
                          <p style="font-size:15px;font-weight:bold;color:black;margin: 10px 0 10px 20px"> Messages</p>  
                        </div>
						<form  method="POST" action="account/delete_message" id="form">
                        <div class="row" style="height:40px;background-color: rgb(248, 245, 240);">
                          <p style="font-size:15px;font-weight:bold;margin: 7px 0 10px 20px">
						  
						  	<label style="font-size: 14px;">
						  <input type="checkbox" id="all" ><span style="cursor: pointer;color: #166fa7;"> Select All </span> 
						  </label>
						  <span style="cursor: pointer;color: #166fa7;margin-left: 100px;" id="delete_message"><input type="submit" value="Delete"/></span> </p>
                        </div>
                        <div class="row" style="background:#e5e5e5;">
                          <p style="font-size:15px;padding-top:10px;">
                            <span style="width:120px;padding-left:20px;display:inline-block;">Name</span>
                            <span style="width:180px;padding-left:36px;display:inline-block;">Ad Title</span>
                            <span style="width:178px;padding-left:16px;display:inline-block;">Message</span>
                            <span style="width:200px;padding-left:20px;display:inline-block;">From</span>
                            <span style="width:100px;padding-left:10px;display:inline-block;">Phone</span>

                          </p>
                        </div>
						<?php
							foreach($messages as $message){
						?>
								<div class="row" style="padding-top: 10px;" >
		                          <p style="width:750px;font-size:15px;margin-left:20px;">
								  <label>
								  	<input name="check[]" type="checkbox" class="all" value="<?php echo $message->message_id; ?>">
								   	<span style="display:inline-block;width:120px;font-weight: normal;cursor: pointer;"><?php echo $message->from_name;  ?></span>
								   </label>
                   <span style="display:inline-block;width:160px;color:#166fa7">
                            <?php 
                              if(strlen($message->title) > 45){
                                 $str =  substr($message->title, 0, 45).'...';
                                 $str = strip_tags($str);
                                 $str = strtolower($str);
                                 echo $str;  
                              }else{
                                echo $message->title;
                              }
                              
                            ?>
                  </span>
								  <span style="display:inline-block;width:180px;color:#166fa7"><?php echo $message->message;  ?></span>
								  <span style="width: 190px;display: inline-block;"><?php echo $message->from_email;   ?></span>
								  <span ><?php echo $message->from_phone_number;   ?></span></p>
		                       </div>
		                      <hr id="small">
						<?php		
							}
						?>
                        </form>
                      
                    </div><!-- /.col-xs-12 -->
                    
                  </div>
                </div><!-- container -->
              </div><!-- jumbotron -->       
            </div><!-- AD List -->
          </div> <!-- row --> 
        </div> <!-- container -->
     
      <div id="footer" style="height:100px;">
       <div class="container" style="width:1024px;margin:0 auto;">
        <p style="font-size:12px;margin:35px 0 35px 0;"> <span style="float:left;"><a href="#">Home</a>&emsp;|&emsp;<a href="#">About Us</a>&emsp;|&emsp;<a href="#">Contact Us</a>&emsp;|&emsp;<a href="#">Privacy Policies</a>&emsp;|&emsp;<a href="#">LIsting Policies</a>&emsp;|&emsp;<a href="#">Help</a></span>
         <span style="float:right;"><a href="#"><img src="<?php echo base_url(); ?>front_style/img/g+.jpg" style="width:20px;height:20px">&nbsp;</a><a href="#"><img src="<?php echo base_url(); ?>front_style/img/tw.png" style="width:22px;height:22px"></a>&nbsp;<a href="#"><img src="<?php echo base_url(); ?>front_style/img/fb.png" style="width:30px;height:30px"></a></span></p>
       </div>
     </div>
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>front_style/js/bootstrap.js"></script>
    <script type="text/javascript">
           $( document ).ready(function() {
                  var t1;
                  var t2;
                  t1 = 0;
                  t2 = 0;
                         $('.trigger1').popover({
                                 'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t2==1){
                          //hide popover
                          $('.trigger2').popover('hide');
                          t2=0;
                          }
                          t1=1;
                          return $(this).parent().find('.head').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.content').html();
                      }
                      
                  });
                  $('.trigger2').popover({
                                   'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t1==1){
                          //hide popover
                          $('.trigger1').popover('hide');
                          t1=0;
                          }
                          t2=1;
                          return $(this).parent().find('.head').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.content').html();
                      }
                  });   
                  });
  </script>
  <script>
  	 $("#all").click(function () {
		var checkAll = $("#all").prop('checked');
	    if (checkAll) {
	        $(".all").prop("checked", true);
	    } else {
	        $(".all").prop("checked", false);
    	}
 	});
  </script>
  </body>
</html>
