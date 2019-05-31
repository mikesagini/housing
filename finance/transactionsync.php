<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'autorec'){//first if

$stats1="Paid"; 
$stats2="Overdue";
$stats3="Occupied"; 
$stats4="Active"; 
$stats5="Cons";
$rct="Receipt No.";
$msgtype1=".Rent of Ksh.";
$msgtype2=".Received Successfully on ";
$msgtype3=".Current Overpayments/Arrears(-) are Ksh.";
$msg="Rent";

$msg2="Ack";
$priority="Normal";
$wel="Thankyou for choosing us.Lease has been activated at ";
 $query1			= mysql_query("SELECT * FROM service_transactions WHERE receipt_no =''");
 
$num_rows0		= mysql_num_rows($query1); 
	
	if($num_rows0 > 0 )
        {//second if
 
    while($query1)
        {//while
  
 				 if($query1 ){//if column query
					     $row = mysql_fetch_assoc($query1);
					     $sid=  $row["service_id"];

					     $date1=  $row["date"];
					     $acc=  $row["account"];
					     $amnt=  intval($row["amount"]);
					     
					     $date        =date('d/m/Y h:i:sa');
					   


						      }//if column query
						    else{echo 3;return false;}//else //col query
  
 
          	
    $query2			= mysql_query('SELECT * FROM units WHERE lipa_kodi="'.$acc.'"');
	
	$num_rows		= mysql_num_rows($query2); 
	
	if($num_rows > 0 )
	
	                {//if account exist
	                
	                
	               

	                 if($query2 ) {// unit query
					      $row1 = mysql_fetch_assoc($query2);
					     $uid=  $row1["unit_id"];
					      $tid=  $row1["tenant_id"];
					       $pid=  $row1["property_id"];
					   					    

						       }//unit query
						    else{echo 4;return false;}//unit query

	                
	                
	                
	                
	                
	                
	                
	                
	                
	                            $query3		= mysql_query('SELECT * FROM all_transactions WHERE unit_id="'.$uid.'"');
	
	                                  $num_rows2		= mysql_num_rows($query3); 
	
	                                        if($num_rows2 > 0 )
	
	                                              {//if unit id does  exist in acc
	                                              $query31			= mysql_query('SELECT MAX(transaction_id) FROM all_transactions WHERE unit_id="'.$uid.'"');
	                                                 $row2 = mysql_fetch_assoc($query31);
					                                  $trid=  $row2["MAX(transaction_id)"];
					                                  
					                                  
					                                  $query32			= mysql_query('SELECT * FROM all_transactions WHERE transaction_id="'.$trid.'"');
	                                                 $row3 = mysql_fetch_assoc($query32);
					                                  $cbal=  $row3["balance"];


	                                              
	                                              $bal=$amnt+$cbal;
	                                              
	                                                  if($bal<0)
	                                                   {
	                                                   $stat=$stats2;
	                                                   }
	                                                   else
	                                                    {
	                                                   $stat=$stats1;
	                                                    }

	                                             
 
	                                           
                                           $query5	=mysql_query("INSERT INTO all_transactions(service_id,tenant_id,property_id,unit_id,balance,trans_status,trans_date,trans_nature) VALUES ('$sid','$tid','$pid','$uid','$bal','$stat','$date','$stats5')");
	 	                     

													if($query5 )
													           {//insert into all trans
													           
										  $query6	=mysql_query("UPDATE units SET status='$stats3' WHERE unit_id='$uid'");
										  $query61	=mysql_query("UPDATE tenants SET lease_status='$stats4' WHERE tenant_id='$tid'");

										           if($query6 && $query61 )
													           {//update units
													           
													           
													 $query7			= mysql_query("SELECT * FROM service_transactions WHERE receipt_no !=''");
	
	                                                        $num_rows3		= mysql_num_rows($query7); 
	 
	                                                          if($num_rows3 > 0 )

													           {//if  receipt 

                                $query8			= mysql_query("SELECT MAX(receipt_no) FROM service_transactions WHERE receipt_no!=''");
                                
                                                            if($query8)
                                                            {
                                                             $row4 = mysql_fetch_assoc($query8);
					                                          $crno=  $row4["MAX(receipt_no)"];

                                                              $rno=$crno+1;
                                                            }
													           else{echo 5;}

                                                        
  

                                 

                                      $query10  =mysql_query("UPDATE service_transactions SET receipt_no='$rno' WHERE service_id='$sid'");
                                      													           
													          
													           if($query10){
													           
													           
													           
													           
													           /***************message to tenant******************************************/
													           
												if($query10)
												     {	         
                                                  
                                                $query12		= mysql_query("SELECT MAX(receipt_no) FROM service_transactions");
	                                                
													if($query12){
													 $row12 = mysql_fetch_assoc($query12);
					                                  $max=  $row12["MAX(receipt_no)"];
					                                  } else{}
					                                  
					                                  $query13		= mysql_query("SELECT * FROM service_transactions WHERE receipt_no='$max'");
	                                                
													if($query13){
													 $row13 = mysql_fetch_assoc($query13);
					                                  $rect=  $row13["receipt_no"];
					                                  $cash=  $row13["amount"];
					                                  $date4=  $row13["date"];
					                                      }else{}
					                                      
					                                      
					                                $query14		= mysql_query("SELECT MAX(transaction_id) FROM all_transactions WHERE unit_id='$uid'");
	                                                
													if($query14){
													 $row14 = mysql_fetch_assoc($query14);
					                                  $maxt=  $row14["MAX(transaction_id)"];
					                                  } else{}
					                                  
					                                   $query15		= mysql_query("SELECT * FROM all_transactions WHERE transaction_id='$maxt'");
	                                                
													if($query15){
													 $row15 = mysql_fetch_assoc($query15);
					                                  $tenid=  $row15["tenant_id"];
					                                  $proid=  $row15["property_id"];
					                                  $unid=  $row15["unit_id"];
					                                  $tenid=  $row15["tenant_id"];
					                                  $arr=$row15["balance"];
					                                  
					                                  } else{}
					                                  
					                                  
					                                  
					                                  
					                                  
					                                  
					                                  
					                                  $query16		= mysql_query("INSERT INTO tenant_messages(tenant_id,property_id,unit_id,message_type,message,msg_date,priority) VALUES ('$tenid','$proid','$unid','$msg',CONCAT('$rct','$rect','$msgtype1','$cash','$msgtype2','$date4','$msgtype3','$arr'),'$date','$priority') ");

					                                  
					                                  
					                                  
                                                     if($query16)
                                                           {
                                                           
                                                            $query162="INSERT INTO income_expense(ie_date,income,inc_amount,expense,exp_amount,property_id,unit_id) VALUES  ('$date',CONCAT('$msg','(Rec-$rect)'),'$cash','-','-','$proid','$unid')";
														      $query172=mysql_query($query162);
														      if(!$query172){echo mysql_error();}                                                            
                                                           }
                                                            else{echo mysql_error();}

					                                      
					                                      
                                                     

                                         










  
													           
													  }  
													  else{echo mysql_error();}       
												/***************message to tenant*******************************************/	           
													           
													           
													           
													           
													           
													           
													           
													           
													           
													           /*echo 1*/}
													           else{echo 7;}
													           
													           }//if  receipt
													           
													           
													           else
													           
													           {//else if no receipt
													           
													                  $rno=100;
                                 

                                      $query11  =mysql_query("UPDATE service_transactions SET receipt_no='$rno' WHERE service_id='$sid'");
                                      													           
													          
													           if($query11){
													           
													           
													           
													           /***************message to tenant******************************************/
													           
												if($query11)
												     {	         
                                                  
                                                $query12		= mysql_query("SELECT MAX(receipt_no) FROM service_transactions");
	                                                
													if($query12){
													 $row12 = mysql_fetch_assoc($query12);
					                                  $max=  $row12["MAX(receipt_no)"];
					                                  } else{}
					                                  
					                                  $query13		= mysql_query("SELECT * FROM service_transactions WHERE receipt_no='$max'");
	                                                
													if($query13){
													 $row13 = mysql_fetch_assoc($query13);
					                                  $rect=  $row13["receipt_no"];
					                                  $cash=  $row13["amount"];
					                                  $date4=  $row13["date"];
					                                      }else{}
					                                      
					                                      
					                                $query14		= mysql_query("SELECT MAX(transaction_id) FROM all_transactions WHERE unit_id='$uid'");
	                                                
													if($query14){
													 $row14 = mysql_fetch_assoc($query14);
					                                  $maxt=  $row14["MAX(transaction_id)"];
					                                  } else{}
					                                  
					                                   $query15		= mysql_query("SELECT * FROM all_transactions WHERE transaction_id='$maxt'");
	                                                
													if($query15){
													 $row15 = mysql_fetch_assoc($query15);
					                                  $tenid=  $row15["tenant_id"];
					                                  $proid=  $row15["property_id"];
					                                  $unid=  $row15["unit_id"];
					                                  $tenid=  $row15["tenant_id"];
					                                  $arr=$row15["balance"];
					                                  
					                                  } else{}
					                                  
					                                  $query16		= mysql_query("INSERT INTO tenant_messages(tenant_id,property_id,unit_id,message_type,message,msg_date,priority) VALUES ('$tenid','$proid','$unid','$msg',CONCAT('$rct','$rect','$msgtype1','$cash','$msgtype2','$date4','$msgtype3','$arr'),'$date','$priority') ");


 
                                                     if($query16)
                                                           {
                                                           
                                                          $query161="INSERT INTO income_expense (ie_date,income,inc_amount,expense,exp_amount,property_id,unit_id) VALUES ('$date',CONCAT('$msg','(Rec-$rect)'),'$cash','-','-','$proid','$unid') ";
														      $query171=mysql_query($query161); 
														       if(!$query171){echo mysql_error();}
                                                           
                                                           }
                                                            else{echo mysql_error();}

					                                      
					                                      


                                         










  
													           
													  }  
													  else{echo mysql_error();}       
												/***************message to tenant*******************************************/
													           
													           
													           
													           
													           
													           }
													           else{echo 8;}
                                               
													           
													           }//else if no receipt
													           
													           
													           
													           
													           
													           }//success if update if units 
													           else{echo 9;}//unsuccessful
													           }//insert into all trans
													           else{echo 10;}//unsuccessful insert into all trans

                                             
                                             
   
	                                              
	                                              
	                                              
	                                              }//if unit id exist in acc
	                                              
	                                              else
	                                              
	                                              
	                                              { 	}//else unit id does not esist

	                
	                
	                
	                
	                
	                
	                
	                
	                
	                
	                
	                }//if acc exist

      else{ }//if acc does not exist
  
  
  
  
  
  
  
  
  }//while  
   
   
   
   
   
   
   
   
   
   
   
   }//second if
   
  else {echo 2;}//second else
   

 
 
 
































}//first if
else
{echo mysql_error();}//first else
?>