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
        $user		= htmlentities($_POST['user']);
	   $county		= htmlentities($_POST['county']);
	   $date        =date('d/m/Y h:i:sa');
	   $status      ="Pending";
	   $ustatus     ="Reserved"; 
	   $tstatus     ="Overdue";
	   $nstatus     ="New";
	   $wel="Thankyou for choosing us.Please pay Ksh.";
	   $wel3=" using your phone to <b>Paybill Number 15158</b>  and <b>Paybill Account No.";
	   $wel2="</b>.  so as  to activate lease.";
	   $type="Welcome";
	   $priori="Normal";
	   $cat="tenant";
		
	
    $query1			= mysql_query('SELECT * FROM tenants WHERE tnational_id="'.$id.'"');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//if no such tenant
 
		
		  $queryu			= mysql_query('SELECT * FROM units WHERE unit_id="'.$unit.'"');
	
						       if($queryu ){// unit stats if
					      $rowu = mysql_fetch_assoc($queryu);
					     $stats=  $rowu["status"];
					    
						  }//units stats if
						  else{echo 0;}
  
	
	           if($stats!="Occupied" && $stats!="Reserved" )
	
	                {//if unit not occupied
 

	
	
	
	
	
	$query	=mysql_query("INSERT INTO tenants(tenant_name,tnational_id,tenant_address,tenant_mobile,tenant_county,property_id,unit_id,lease_status,date,user ) VALUES ('$name','$id','$addr','$mobile','$county','$prop','$unit','$status','$date','$user')");
	 	

	if($query )
	           {//add if
	           
	           
	        $tenquery= mysql_query('SELECT MAX(tenant_id) FROM tenants WHERE tnational_id = "'.$id.'"  ');
	
     
     
     
     
     if($tenquery ){// id if
     $rowp = mysql_fetch_assoc($tenquery);
     $tid=  $rowp["MAX(tenant_id)"];
	  }//id if
	           
	        

   
	$query2=mysql_query("UPDATE units SET tenant_id='$tid',status='$ustatus' WHERE unit_id='$unit'");    
	
if($query2)
   {
   
   
   
    $queryunits			= mysql_query('SELECT * FROM units WHERE unit_id="'.$unit.'"');
	
						       if($queryunits ){// unit stats if
					      $rowun = mysql_fetch_assoc($queryunits);
					     $ppid=  $rowun["property_id"];
					     $ttid=  $rowun["tenant_id"];
					      $amnt=  $rowun["rent"];
					       $lipa=  $rowu["lipa_kodi"];


					     
						  }//units stats if
						  else{echo 0;}
  

   
   
   $bal=0-intval($amnt);
   
   
   $query2=mysql_query("INSERT INTO all_transactions(tenant_id,property_id,unit_id,balance,trans_status,trans_date,trans_nature) VALUES('$ttid','$ppid','$unit','$bal','$tstatus','$date','$nstatus')"); 
   
   if($query2)
   {
   
   
                                             	                                                                  
$query10		= mysql_query("INSERT INTO tenant_messages(tenant_id,property_id,unit_id,message_type,message,msg_date,priority) VALUES ('$ttid','$ppid','$unit','$type',CONCAT('$wel','$amnt','$wel3','$lipa','$wel2'),'$date','$priori') ");                
	 if($query10)
	  {                                                                    
   
 $query11		= mysql_query("INSERT INTO users(unational_id,category) VALUES ('$id','$cat') ");                

  if($query11){echo 1;}
  else{echo 0;}









   }else{echo 0;}
    }
    
    else{echo 0;} 
   
   }  
   else{echo 0;}     
	           
	           
 }//add if 
	           
	else
	  {	
	  
	  //echo 0;
	  echo mysql_error();
	  }//add else
	  
	    }//if unit unncoupied
	    
      else{echo 3;}//else unit ocoupied
 
		
		
                   }//if no such tenant
                   
                   
                   
                  else
                 {echo 2;}//else  such tenant
 
                }//first if action entity 
  			
					
else
{echo 0;}//first else

?>