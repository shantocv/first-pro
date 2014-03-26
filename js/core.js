$(document).ready(
	function(){
		
		$('#state').change(
			function(){
				var state=$('#state').val();
				$.post(base_url + "register/select_city",{'state':state},function(data){
					
					$('#city').html(data);
				});
			}
		
		);
		
		$('#login_button').click(
			function(){
				var password=$('#password').val();
				var email=$('#email').val();
				if($('#email').val() == ""){
					$('#error').html('enter your email id *');
				}else if($('#password').val() == ""){
					$('#error').html('enter your password *');
				}else if(!validateEmail(email)){
					$('#error').html('invalid email.');
				}else if(password.length < 5){
					$('#error').html('Your password must be at least 8 characters long.');
				} 
				else{
					var datas='email='+ email + '&password=' + password + '&remember_me=' + $('#remember_me').is(':checked');
					$.ajax({
						type: "POST",    
						url: base_url + 'login_page/login_user',
						data: datas,
						success: function(msg)
						{
							if(msg == 0){
								$('#error').html('invalid username or password.');
							}else if(msg == 1){
								window.location.href=base_url + 'home';
							}
						}
					});	
				}
				return false;
			}
		
		);
		
		$('#register_button').click(
			function(){
				var password=$('#password').val();
				var email=$('#email').val();
				if($('#email').val() == ""){
					$('#error').html('enter your email id *');
				}else if($('#password').val() == ""){
					$('#error').html('enter your password *');
				}else if(!validateEmail(email)){
					$('#error').html('invalid email.');
				}else if(password.length < 6){
					$('#error').html('Your password must be at least 5 characters long.');
				} 
				else{
					var datas='email='+ email + '&password=' + password ;
					$.ajax({
						type: "POST",    
						url: base_url + 'register/add_new',
						data: datas,
						success: function(msg)
						{
							if(msg == 0){
								$('#error').html('This email id already exists.Try another one');
							}else if(msg == 1){
								window.location.href=base_url + 'success';
							}
						}
					});	
				}
				return false;
			}
		
		);
		
		function validateEmail(email) { 
				var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
	
	
	}

	
 );