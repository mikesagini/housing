<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'appr'){//first if action entity 
	   $id		= htmlentities($_POST['iss']);
	    $date        =date('d/m/Y h:i:sa');
	    $work       ="Pending";
	    $stat       ="Approved";
	   
	   
	   $ten= mysql_query("SELECT * FROM tenant_issues WHERE issue_id='$id'");
	   $query=mysql_num_rows($ten);
	   
	   if($query  > 0)
	   
	      {
	      
	       if($query)
	     {
	    $row1 = mysql_fetch_assoc($ten);
        $sta=  $row1["issue_status"];
         }else{echo 0;}
        
	      if($sta=="Pending"){
	     
	   $query1=mysql_query("UPDATE tenant_issues SET issue_status='$stat',approval_date='$date',workorder_info='$work' WHERE issue_id='$id'");
         
         if($query1){echo 1;}
         else{echo 0;}
         
           }else{echo 2;}

 
         
          }
          else{echo 0;}  
        
        
 }
 
else{echo 0;}      
        
        
        
        
        
        
        
        
        
?>