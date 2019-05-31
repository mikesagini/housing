$(document).ready(function(){
	$('#lusername').focus();  
	$('#userlogin').click(function(){  
		var username = $('#lusername');  
		var password = $('#lpassword');  
		var login_result = $('.login_result'); 
		login_result.html('loading..');  
		if(username.val() == ''){  
					username.focus();  
			login_result.html('<span class="error">Enter the username</span>');
			return false;
		}
		if(password.val() == ''){ 
			password.focus();
			login_result.html('<span class="error">Enter the password</span>');
			return false;
		}
	
		if(username.val() != '' && password.val() != ''){
			
			var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			//alert(UrlToPass);
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : 'loginchecker.php',
			success: function(responseText){ 
			
			//alert(responseText)
				if(responseText == 0){
					login_result.html('<span class="error">Username or Password Incorrect!</span>');																		
				}
				else if(responseText == 1){
					window.location = 'index.php';
				}
				
				else if(responseText == 3){
					window.location = 'portal.php';
				}

				else{
				alert(responseText);
					login_result.html('<span class="error">Login Error</span>');				}
			}
			});
		}
		return false;
	});
});
