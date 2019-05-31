


//begin javascript

function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.tenantinfo.tunit.options.length-1;j>=0;j--)
{
document.tenantinfo.tunit.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].unit_name;
optn.value = myarray.data[i].unit_id;  // 
document.tenantinfo.tunit.options.add(optn);

} 
      }
    } // end of function stateck
	var url="tenancy/unitselection.php";
var cat_id=document.getElementById('tprop').value;
url=url+"?cat_id="+cat_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
  
  
  //end javascript begin jquery
  
  
  
  
  $(document).ready(function(){
$('#tunit').empty().append('<option selected="selected" value="0">Select</option>');


 $("#tprop").live("change", function() {
     
     
     $("#rrent").val("");
     $("#aacc").val("");
});


//onchange prop
//on unit change
 $("#tunit").live("change", function() {
     
     
     $("#rrent").val("");
     $("#aacc").val("");

        
       

        var acc=$(this).find("option:selected").attr("value");
        var datasent='action=accrent&acc='+acc;
        
        if(acc!='')
          {
        $.ajax({//ajax
        type :'POST',
        url:"tenancy/rentandlipa.php",
        data:datasent,
        dataType:'json',
       
        success:function(s)
          {
         
             $("#rrent").val("Ksh"+s[0]);
             $("#aacc").val(s[1]);

           
           
           
          },
       error: function()    { 
          
          
						    }
						 
        
        
        
                });//ajax
        }
        else
        
          {
             $("#rrent").val("No Data");
             $("#aacc").val("No Data");

          

          
          }
          
     });

//onchange end

  
  
  
  
  
  
$(document).ready(function(){
	
	$('#new_tenant').click(function(){
	$('#editcare').prop("disabled",true);
	$('#addcare').prop("disabled",false);
 $("#tenants_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	//add tenant
	
		$('#addtenant').click(function(){ // 
		
		$("#rrent").val("");
        $("#aacc").val("");

		
		var name = $('#tname'); 
		var id = $('#tnid'); // 
		var address = $('#tadd'); // 
		
     	var county = $('#tcounty');
     	var prop = $('#tprop');
     	var unit = $('#tunit');
     	var user=$('#cuser');
		
		var mobile = $('#tmob');		
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("t1").innerHTML="Fill in Name";
			
			
			return false;
		}

if((id.val() == '') || (isNaN(id.val()))){ // ...


			id.focus(); // ...


			document.getElementById("i1").innerHTML="Fill in ID";
			return false;
		}

		

if(address.val() == ''){ // ...


			address.focus(); // ...


			document.getElementById("a1").innerHTML="Fill in Residence";
			return false;
		}





if(county.val() == ''){ // Check 
			county.focus();
			document.getElementById("cou1").innerHTML="Select  County";
			return false;
		}
if((mobile.val() == '') || (isNaN(mobile.val()))){ // ...


			mobile.focus(); // ...


			document.getElementById("mo1").innerHTML="Fill in Phone";
			return false;
		}
		
		
if(prop.val() == ''){ // Check 
			prop.focus();
			document.getElementById("p1").innerHTML="Select  Property";
			return false;
		}

if((unit.val() =="0") && ($(unit).find("option:selected").attr("value")==null)){ // Check 
			unit.focus();
			document.getElementById("u1").innerHTML="Select  Unit";
			return false;
		}

		
 
		//tenancy
	
		
	
		if(name.val() != '' && id.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newtenant&name='+name.val()+'&id='+id.val()+'&county='+county.val()
		                  +'&mobile='+mobile.val()+'&prop='+prop.val()+'&unit='+unit.val()+'&addr='+address.val()+'&user='+user.val();
		                  	
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'tenancy/tenantmanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#tenants_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add tenant",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#tenants_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Tenant Added Successfully,please pay amount indicated to Activate Lease",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

             unit.empty().append('<option selected="selected" value="0">Select</option>');

				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#tenants_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"warning",
Content:"Tenant already in database!Click on Tenant to lease more units",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
							else if(responseText==3)
				
				{
				
	/*begin notification*/			
				$('#tenants_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Unit already Reserved/Occupied",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}

				
				
				else{
					alert(responseText);
$('#tenants_mod').modal('hide');
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

 //add tenant end 
  
  });//doc load
  
  
  
  
  
  
  
  
