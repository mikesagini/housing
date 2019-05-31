<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newreq'){//first if action entity 
	   $issu		= htmlentities($_POST['iss']);
	   $issue     = strtolower($issu);
	   $cat		= htmlentities($_POST['cat']);
	   $nid		= htmlentities($_POST['nid']);
	   
	   
	   $ten= mysql_query("SELECT tenant_id FROM tenants WHERE tnational_id='$nid'");
	   if($ten)
	     {
	    $row = mysql_fetch_assoc($ten);
        $tenant=  $row["tenant_id"];
        $date        =date('d/m/Y h:i:sa');
        $stat="Pending";
        
        }
        else{echo 0;echo mysql_error(); }
        
        
          $ten1= mysql_query("SELECT unit_id FROM units WHERE tenant_id='$tenant'");
	   if($ten1)
	     {
	    $row1 = mysql_fetch_assoc($ten1);
        $uid=  $row1["unit_id"];
        
        
        }
        else{echo 0;echo mysql_error(); }


 
 
    
    if($ten){
	   
$query=mysql_query("INSERT INTO tenant_issues(tenant_id,unit_id,issue,category,date_raised,issue_status) VALUES ('$tenant','$uid','$issue','$cat','$date','$stat')");
          if($query){echo 1;}
          else{echo mysql_error();}           
          
          }
         else{ echo 0;}




}	
else{echo 0;}
?>