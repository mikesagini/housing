<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newwork'){//first if 
	   $sum1		= htmlentities($_POST['sum']);
	   $sum     = strtolower($sum1);
	   $due		= htmlentities($_POST['due']);
	   $cost		= htmlentities($_POST['cost']);
	   $comp		= htmlentities($_POST['comp']);
	   $issid		= htmlentities($_POST['iss']);
        $date        =date('d/m/Y h:i:sa');
	    $stats="Open";
	    $stats2="Passed";
	    $exp="Workorder";
	
		
	
    $query1			= mysql_query('SELECT * FROM workorders WHERE issue_id="'.$issid.'"');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//if no such work
	                
	                
 
		
		  $query2			= mysql_query('SELECT unit_id FROM tenant_issues WHERE issue_id="'.$issid.'"');
	
						    if($query2 ){// unit stats if
					      $rowu = mysql_fetch_assoc($query2);
					     $uid=  $rowu["unit_id"];
						  }//units stats if
						  else{echo 0;}
						  
			  $query22			= mysql_query('SELECT property_id FROM units WHERE unit_id="'.$uid.'"');
	
						    if($query22 ){// unit stats if
					      $rowp = mysql_fetch_assoc($query22);
					      $pid=  $rowp["property_id"];
						  }//units stats if
						  else{echo 0;}
  
			  
						  
						  
  
	
	          
	 	
	        

	      $query4=mysql_query("UPDATE tenant_issues SET workorder_info='$stats2' WHERE issue_id='$issid' ");
	      
	      $query5=mysql_query("INSERT INTO workorders(issue_id,summary,date_opened,date_due,work_status,co_id,work_cost ) VALUES('$issid','$sum','$date','$due','$stats','$comp','$cost')");                
	      
          
                 
	      $query6="INSERT INTO income_expense (ie_date,income,inc_amount,expense,exp_amount,property_id,unit_id) VALUES";                  
	      $query6.="('$date','-','-',CONCAT('$exp','(ID-$issid)'),'$cost','$pid','$uid')";
	      $query7=mysql_query($query6); 
	      


           if($query4 && $query5 && $query7) 
           
             {
             echo 1;
             
             }                   
	         else{echo 0;}             
	                      
	              
	                                                         
	                                                        
	                                           
	                                           
	                                           
	                                           
     
     
                         }//f no such work
                         
                         
                         else{echo 2;}//such work
     
     
	      }//first If
	      
else{echo 0;}//first else	      