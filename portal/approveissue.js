$(document).ready(function(){
	










	
	
	
	
		$('#appr').click(function(){ // 
		var issue = $('#issr'); 
		
		
		
				
	
      // alert(issue.val());

	
	
		if(issue.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=appr&iss='+issue.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'portal/approveissue.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
					
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Approve Failure",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					


MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"primary",
Content:"Approval Success",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

issue.val("");



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
					
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"warning",
Content:"Issue Arleady approved",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
			issue.val("");	
				}
				
				
				
				else{
					//alert(responseText);

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"database error!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

				}
			}
			});
		}
		return false;
	});
});

