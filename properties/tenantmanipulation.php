<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newtenant'){//first if 
	   $name1		= htmlentities($_POST['name']);
	   $name      = strtolower($name1);
	   $id		= htmlentities($_POST['id']);
	   $addr		= htmlentities($_POST['addr']);
	   $mobile		= htmlentities($_POST['mobile']);
	    $prop		= htmlentities($_POST['prop']);
        $unit		= htmlentities($_POST['unit']);

	   $county		= htmlentities($_POST['county']);
	   $date        =date('d/m/Y h:i:sa');
	   $status      ="Pending";
	   
		
	
     
	
	if(true )
	
	                {//if no such tenant
 
		
	
	
	
	
	
	$query	=mysql_query("INSERT INTO tenants (tenant_name,tnational_id,tenant_address,tenant_mobile,tenant_county,property_id,unit_id,lease_status,date ) VALUES ('$name','$id','$addr',$mobile','$county','$prop','$unit','$status','$date')");
	 	

	if($query )
	           {//add if
	           
	           
	        $tenquery= mysql_query('SELECT MAX(tenant_id) FROM tenants WHERE tnational_id = "'.$id.'"  ');
	
     
     
     
     
     if($tenquery ){// id if
     $rowp = mysql_fetch_assoc($tenquery);
     $tid=  $rowp["NAX(tenant_id)"];
	  }//id if
	           
	        

   
	$query2=mysql_query("INSERT INTO units(tenant_id) VALUES('$tid')  ");    
	
if($query2)
   {
   
   
  echo 1; 
   
   
   }  
   else{echo 0;}     
	           
	           
 }//add if 
	           
	else
	  {	echo 0;}//add else
	  
	  
		
		
                   }//no such owner
                   
                  else
                 {echo 2;}//such owner
 
                }//first if action entity 
  			
					
else
{echo 0;}//first else

?>