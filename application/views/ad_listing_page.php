<?php
	include('include/front_header.php');

?>
<div class="container " id="wrapper">
    
        <div class="row" style="width:1024px;padding:0;margin:0 auto;margin-top:24px;margin-bottom:10px;" >
      
          <!-- Categories -->
          <div class="col-sm-3" id="leftside-bar" style="width:250px;margin:0 0 0 0;border:1px bold #eee;">
        
            <div class="panel-group" id="categories" style="margin-bottom:15px;">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-category">
                  <h4 class="panel-title">
                  <a class="accordion-toggle" id="nounderline" style="color:white;" data-toggle="collapse" data-parent="#categories" href="#category">
                   Categories<i class="glyphicon glyphicon-chevron-down" style="padding-left:60%;padding-right:5%;"></i>
                 </a>
               </h4> 
             </div>
             <div id="category" class="panel-collapse collapse in">
               <div class="panel-body" style="margin-left:15px;">
                 <div id="allcategory" class="panel-collapse collapse in">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#category" href="#subcategory">? All category</a>
                  
                   </div><!--All category-->   
                     <div id="subcategory">
                       <div id="realsestate">
                         <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#allcategory" href="#realsestatelist">
                          &emsp;&emsp;? Realestate
                         </a>
                         <div id="realsestatelist" class="panel-collapse collapse">
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 1</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 2</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 3</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 4</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 5</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Real estate ad 6</a><br>
                         </div>
                       </div>         
                       <div id="mobilephones">
                         <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#allcategory" href="#mobilephoneslist">
                            &emsp;&emsp;? Mobile Phones
                         </a>
                         <div id="mobilephoneslist" class="panel-collapse collapse">
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Mobile ad 1</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Mobile ad 2</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Mobile ad 3</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Mobile ad 4</a><br>
                           <a id="nounderline" href="#">&emsp;&emsp;&emsp;&emsp;Mobile ad 5</a><br>
                         </div>
                       </div> 
                     </div>
                   </div><!--panel body-->      
                 </div>
               </div>
             </div>


             <div class="panel-group" id="pricecol" style="margin-bottom:15px;">
               <div class="panel panel-default">
                 <div class="panel-heading" id="panel-price">
                   <h4 class="panel-title">
                      <div class="row">
                        <a class="accordion-toggle" id="nounderline" data-toggle="collapse" data-parent="#pricecol" style="padding-left:5%;padding-right:5%;color:white;" href="#pricerange">
                      Price<i class="glyphicon glyphicon-chevron-down" style="padding-left:70%;padding-right:5%;"></i>
                        </a>
                    
                     </div>
                   </h4> 
                 </div>
               
               <div class="panel-collapse collapse in" id="pricerange">
                 <div class="panel-body">
                   <div class="row"> 
                     
                       <div class="col-sm-4" style="margin-left:20px;">
                         
                           <input type="number" min="1" style="background-color:#f5f5f5;height:25px;width:90px;"  class="form-control" placeholder="min">
                        
                      </div>
                      <div class="col-sm-4 " style="">
                        
                          <input type="number" min="1" style="background-color:#f5f5f5;height:25px;width:90px;" class="form-control" placeholder="max">
                            
                       
                      </div>
                      <div class="col-sm-1" >
                        
                          <button class="btn btn-default" style="background-color:#012346;color:white;height:25px;padding:0 5px;" type="button"><i class="glyphicon glyphicon-chevron-right"></i></button>
                       
                      </div>
                    </div>
                  </div>
                </div><!-- input-group -->
              </div>
            </div>  
          
          
            <div class="panel-group" id="sellertype">
              <div class="panel panel-default">
                <div class="panel-heading" id="panel-seller">
                  <h4 class="panel-title">
                   <a class="accordion-toggle" id="nounderline" data-toggle="collapse"  data-parent="#sellertype" href="#listseller">
                  Seller Type<i class="glyphicon glyphicon-chevron-down" style="padding-left:58%;padding-right:5%;"></i>
                  </a>
                 </h4> 
              </div>
              <div class="panel-collapse collapse in" id="listseller">
                <div class="panel-body" style="margin-left:15px;">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Any
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Individual
                     </label>
                   </div>
                   <div class="checkbox">
                     <label>
                       <input type="checkbox"> Business
                     </label>
                   </div>
                </div>
              </div><!-- input-group -->
            </div>
          </div>
            
        </div><!-- Categories -->
        
        
        <!-- AD List -->
        <div class="col-sm-8" id="adlist">
          <div class="jumbotron" id="adlisttop" style="width:750px;padding:0">
            <div class="container">
              <div class="row">
                <!--div class="col-sm-6"-->  
                  <ul class="breadcrumb" style="font-size:15px;margin-bottom:5px;">  
                    <li>  
                     <a href="#">India</a> 
                    </li>  
                    <li>  
                      <a href="#">Karnataka</a>  
                    </li>  
                    <li class="active">Banglore</li>  
                  </ul>  
                        
                <!--/div-->
              </div>
              <div class="row">
                <div class="col-sm-12" style="m">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="pull-left"><p><strong>Real Estate</strong></p></div>
                    </div>
                    <div class="col-sm-6" >
                      <div class="left-inner-addon">
                        <i class="glyphicon glyphicon-search" style="padding:4px 0 0 6px;"></i>
                        <input style="background-color:#f5f5f5;" type="text" class="form-control" placeholder="Search Within Real Estate">
                      </div><!-- left-inner-addon -->
                    </div>
                 </div>
               </div><!-- /.col-sm-12 -->
                
            </div>
            <hr id="big"> 
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="row">
                     <div class="col-sm-9" style="font-size:15px;">
                       <ul class="breadcrumb" style="margin:0;padding:0 0 0 5px">  
                         <li>  
                           <a href="#">All</a> 
                         </li><li>  
                           <a href="#">Real Estate</a>  
                         </li><li class="active">Apartment - For Sale</li>  
                       </ul>
                     </div>
                     <div class="col-sm-3">
                       <p class="pull-left" style="font-size:15px;padding:5px 0 0 0;">1000 Results</p>
                     </div>
                   </div>  
                 </div>
                 <div class="col-sm-4" style="font-size:15px;">
                   <div class="row pull-right" style="padding-right:20px;">
                       <span>Sort by</span>
                       <select>
                         <option>price min to max</option>
                         <option>price max to min</option>
                         <option>new-old</option>
                       </select>
                    </div>
                  </div>
                            
                </div><!-- /.col-sm-12 -->
                
              </div>
              <hr>
              <div class="col-sm-12" id="adlistmain" >
                <div class="row" id="adcontainer" style="background:#fff; padding:10px;">
                  <div class="col-sm-12" >
                    <img style="width:100%;height:90px" src="img/ad1.png"class="img-responsive" alt="Responsive image">
                  </div><!-- /.col-sm-12 -->
                </div>
                
                
                <hr id="big"> 
                <div class="row" id="adcontainer" style="background:#edebec">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:160px;height:115px;" src="img/controls.png" class="img-responsive" alt="Responsive image">
                      </div>
                      <div class="col-sm-7">
                        <div class="row">
                          <p id="adtitle"><strong>AD title</strong></p>
                        </div>
                        <div class="row">
                          <p style="font-size:13px;color:#c0bebf;margin-left:15px">AD details here.AD details here.AD details here.AD details here.AD details here.</p>
                        </div>
                        <hr id="small">
                        <div class="row">
                          <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px">RS:33,000</p>
                          <p class="pull-right" style="font-size:15px;margin:0 15px 0 0">12-Nov-2013</p>
                        </div>
                      </div>
                      <div class="col-sm-2" id="adbt">
                        <div class="row">
                          <button class="btn btn-lg" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                        </div>
                      </div>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
                <hr id="big"> 
                <div class="row" id="adcontainer" style="background:#edebec">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:160px;height:115px;" src="img/controls.png" class="img-responsive" alt="Responsive image">
                      </div>
                      <div class="col-sm-7">
                        <div class="row">
                          <p id="adtitle"><strong>AD title</strong></p>
                        </div>
                        <div class="row">
                          <p style="font-size:13px;color:#c0bebf;margin-left:15px">AD details here.AD details here.AD details here.AD details here.AD details here.</p>
                        </div>
                        <hr id="small">
                        <div class="row">
                          <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px">RS:33,000</p>
                          <p class="pull-right" style="font-size:15px;margin:0 15px 0 0">12-Nov-2013</p>
                        </div>
                      </div>
                      <div class="col-sm-2" id="adbt">
                        <div class="row">
                          <button class="btn btn-lg" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                        </div>
                      </div>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
                <hr id="big"> 
                <div class="row" id="adcontainer" style="background:#edebec">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:160px;height:115px;" src="img/controls.png" class="img-responsive" alt="Responsive image">
                      </div>
                      <div class="col-sm-7">
                        <div class="row">
                          <p id="adtitle"><strong>AD title</strong></p>
                        </div>
                        <div class="row">
                          <p style="font-size:13px;color:#c0bebf;margin-left:15px">AD details here.AD details here.AD details here.AD details here.AD details here.</p>
                        </div>
                        <hr id="small">
                        <div class="row">
                          <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px">RS:33,000</p>
                          <p class="pull-right" style="font-size:15px;margin:0 15px 0 0">12-Nov-2013</p>
                        </div>
                      </div>
                      <div class="col-sm-2" id="adbt">
                        <div class="row">
                          <button class="btn btn-lg" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                        </div>
                      </div>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
                <hr id="big"> 
                <div class="row" id="adcontainer" style="background:#edebec">
                  <div class="col-sm-12" >
                    <!--div class="container"-->
                      <div class="col-sm-3" id="adim">
                        <img style="width:160px;height:115px;" src="img/controls.png" class="img-responsive" alt="Responsive image">
                      </div>
                      <div class="col-sm-7">
                        <div class="row">
                          <p id="adtitle"><strong>AD title</strong></p>
                        </div>
                        <div class="row">
                          <p style="font-size:13px;color:#c0bebf;margin-left:15px">AD details here.AD details here.AD details here.AD details here.AD details here.</p>
                        </div>
                        <hr id="small">
                        <div class="row">
                          <p class="pull-left" style="font-size:15px;font-weight:bold;margin-left:15px">RS:33,000</p>
                          <p class="pull-right" style="font-size:15px;margin:0 15px 0 0">12-Nov-2013</p>
                        </div>
                      </div>
                      <div class="col-sm-2" id="adbt">
                        <div class="row">
                          <button class="btn btn-lg" style="background-color:#e4c326;width:100px;height:40px;"><strong>Reply</strong></button>
                        </div>
                      </div>
                      
                    <!--/div-->
                  </div><!-- /.col-sm-12 -->
                    
                </div>
                
                 <hr id="big">
                 <div class="row" id="adcontainer">
                        <div class="col-sm-12" style="height:200px;">
                            
                        </div><!-- /.col-sm-12 -->
                    </div>
                 </div>
              </div><!-- container -->
            </div><!-- jumbotron -->
            
            
            
        </div><!-- AD List -->
         
       
      </div> <!-- row -->
      
     
      
    </div> <!-- container -->
    </div>
	 <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo base_url(); ?>style/js/bootstrap.min.js></script>
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
<?php
	include('include/front_footer.php');
?>