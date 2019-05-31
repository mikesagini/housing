  
  $(document).ready(function(){

$('#auto_receipt').click(function(){ 
		
		var flag = 1; 
		

 
		
		
		
	
		if(flag== 1 )
		{ // Check 			
		                  var UrlToPass = 'action=autorec&flag='+flag;
		                //alert(flag);  
		                  	
			                
	$.ajax({ // 
	
	

			type : 'POST',
			
			data : UrlToPass,
			url  :'finance/transactionsync.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
					
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Auto receipt failure",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 12){
					


MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Auto receipt completed successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

            

				}
				
					else if(responseText == 2){
					


MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"warning",
Content:"All transactions already receipted",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

            

				}

				
				
					

				
				
				else{
				//alert(responseText);

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Auto receipt completed successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

				}//final else
				
			}
			});//ajax emd
		}
		return false;
}); //click end
});//load end







