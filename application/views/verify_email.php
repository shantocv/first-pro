<?php
	include('include/front_header.php');

?>

<div class="container" id="wrapper" style="width:100%;margin:0 auto;margin-top:25px;padding:0;">    
        <div class="row" style="width:1000px;padding:0;margin:0 auto;margin-top:24px;margin-bottom:10px;pading:0;" >
      
        <div style="background-color:#e5e5e5;width:990px;height:60px;font-size:16px;padding:10px;">
		A verification email has sent to Your email ID. 
		<br/>
		You have to verify your email ID to log in by clicking the activation link that has been send to your email.
	</div>  
	
          
		
         
       
      </div> <!-- row -->
      
     
      
    </div> <!-- container -->
    </div>
    <script src="<?php echo base_url(); ?>front_style/js/bootstrap.js"> </script>
	
	
	
	
	
	<script type="text/javascript">
           $( document ).ready(function() {
                  var t1;
                  var t2;
                  t1 = 0;
                  t2 = 0;
				  $('.trigger1').click(
				  	function(){
						if(t1 == 1){
							t1=0;
						}
					}
				  );
				  
				  $('.trigger2').click(
				  	function(){
						if(t2 == 1){
							t2=0;
						}
					}
				  );
				         $('.trigger1').popover({
				                 'placement': 'bottom',
                      html: true,
                      title: function () {
                          if(t2==1){
                          //hide popover
                          $('.trigger2').click();
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
                          $('.trigger1').click();
                          t1=0;
                          }
                          t2=1;
                          return $(this).parent().find('.reg').html();
                      },
                      content: function () {
                          
                          return $(this).parent().find('.regcont').html();
                      }
                  });
                  
                    
                   
                    
         });
        </script>
		
<?php
	include('include/front_footer.php');
?>