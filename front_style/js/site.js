$(function() {
	$(document).on('change', '#userfile', function(e) { 
   	var name=$('#userfile').val();
	name=name.split("\\");
	name=name.pop();
	$('#upload_wait').html('<img src='+base_url+'front_style/img/loading.gif>');
	var datastring='name='+name;
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./upload/do_upload/', 
         fileElementId  :'userfile',
         data        :name,
		 dataType    : 'json',
         success  : function(data,status)
         {
		 	var im='<p id=id'+data.id+'><img style="width:90px;height:70px;margin:10px 0 0 35px;background:#fafbfd;" src='+data.msg+'>' + '<a id=nounderline style="color:#4698ca;cursor:pointer;margin-left:30px;" onclick=remove_photo('+data.id+')> Remove this Photo </a></p>';
			$('#upload_wait').html('');
			$('#thumb').append(im);
         }
      });
      return false;
   });
});