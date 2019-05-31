
<?php
include 'sessions.php';

if(!isset($_SESSION['uname']) || $_SESSION['uname'] == '')
 
  {
  
  
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
	return false;
  }
 
  
else  if($_SESSION['category'] =="employee" || $_SESSION['category'] =="administrator"   ){
	
}




else  if($_SESSION['category'] !="employee" && $_SESSION['category'] !="administrator" ){

echo '<script type="text/javascript">window.location = "login.php"; </script>';
	return false;

	
}
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Welcome</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.php">
                  <img src="img/logo.png" alt="Desarid" /> 
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                  

                   
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="img/avatar1-small.png" alt="">
                               <span class="username"><?php echo ucfirst($_SESSION['uname']);?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                               <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
                               <li><a href="login.php
"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu active">
                  <a class="" href="index.php">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Properties</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="properties.php">Buildings/Plots</a></li>
                      <li><a class="" href="properties.php">Units</a></li>
                      <li><a class="" href="properties.php">Owners</a></li>
                      <li><a class="" href="properties.php">CareTakers</a></li>
                  
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-cogs"></i>
                      <span>Tenancy</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="tenant.php">Tenants</a></li>
                      <li><a class="" href="tenant.php">Rent</a></li>
                      <li><a class="" href="tenant.php">Issues</a></li>

                      
                                  
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-money"></i>
                      <span>Finance</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="finance.php">Lipa Kodi</a></li>
                      <li><a class="" href="finance.php">Payments</a></li>
                      <li><a class="" href="finance.php">Income/Expense</a></li>
                  
                  </ul>
              </li>
              
                 <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-tasks"></i>
                      <span>Work Orders</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="workorders.php">New</a></li>
                      <li><a class="" href="workorders.php">Open</a></li>
                      <li><a class="" href="workorders.php">Closed</a></li>

                  
                  </ul>
              </li>

 <li class="sub-menu" >
                  <a href="javascript:;" disabled="disabled" class="">
                      <i class="icon-th"></i>
                      <span>Reports</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                  <li><a class="" href="report.php">View Reports</a></li>
                      
                  </ul>
              </li>


              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-fire"></i>
                      <span>Administration</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="admin.php">Users</a></li>
                      
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-file-alt"></i>
                      <span>Portals</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="portal.php">Tenant Portal</a></li>
                      <li><a class="" href="portal.php">Caretaker Portal</a></li>
                     </ul>
              </li>
              
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                    Alfonse Housing Agency -  Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Alfonse Housing Ltd </a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                
                <!--END METRO STATES-->
            </div>
            
              

              <div class="row-fluid">
                 <div class="span6">
                     <!-- BEGIN NOTIFICATIONS PORTLET-->
                     <div class="widget blue">
                         <div class="widget-title">
                             <h4><i class="icon-bell"></i> Rent arrears notification </h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                         </div>
                         <div class="widget-body" >
                             <ul class="item-list scroller padding"  style="overflow: hidden; width: auto; height: 320px;" data-always-visible="1">
                                    <li>
                                     <span class="label label-info"><i class=" icon-asterisk"></i></span>
                                     <span>All overdue balances will be displayed here...</span>
                                     
                                     
                                     
                                 </li>
                           

                                
                                 <?php
                              include 'config.php';
                              $query=mysql_query("SELECT MAX(transaction_id),tenant_id,balance,unit_id AS id,tenant_id,balance,unit_id  FROM all_transactions GROUP BY tenant_id ORDER BY balance DESC");
								
								while($row=mysql_fetch_array($query))
										  {
										  $tid=$row["tenant_id"];
										  $bbal=$row["balance"];
										  
										  
										  $query2			= mysql_query('SELECT * FROM tenants WHERE tenant_id="'.$tid.'"');
	                                                 if(!($query2 && $query)){echo mysql_error();}
	                                                 
	                                                 $row3 = mysql_fetch_assoc($query2);
					                                  $name=  $row3["tenant_name"];
					                                  $mob=  $row3["tenant_mobile"];
					                                  $max=$row["MAX(transaction_id)"];
					                                  $uid=$row["unit_id"];
										 // echo $max."=".$bbal;
										  $query2=mysql_query("SELECT balance FROM all_transactions WHERE transaction_id='$max'");
												 if($query2)
												   {
												   
												   $row2=mysql_fetch_array($query2);
										  
										            $ball=$row2["balance"];

												   
										       //echo $max.">".$ball;		   

										       
										  
										          }
										          
										        $query3=mysql_query("SELECT units.*,properties.* FROM units LEFT JOIN properties ON units.property_id=properties.property_id WHERE tenant_id='$tid'");  
										           if($query3)
										           {
										           $row3=mysql_fetch_array($query3);
										           $pname=$row3["property_name"];
										           $uname=$row3["unit_name"];


										        		   }
										        		   else{mysql_error();}

					                                  if($ball < 0)
					                                  {
					                                  echo '<li>';
					                                
				                                     echo '<span class="label label-success"><i class="icon-bell"></i></span>';
				                                     echo '<span>'.$name."<div class='pull-right'><i></i>[ ".$pname.']</span>';
				                                     
				                                     echo '<span class="small italic "><i>Cell  </i>['.$mob.']</span>';
				                                     echo '<span class="small italic "><i>unit  </i>['.$uname.']</span>';
				                                     echo '<span class="small italic bold" style="color:red;"><i>bal  </i>['.$ball.']</span></div>';


				                                     echo ' </li>  ' ;
				                                         
				                                         }
				                                         
				                                         
				                                         else
				                                         {
				                                         /*
				                                          echo '<li>';
					                                
				                                     echo '<span class="label label-success"><i class="icon-bell"></i></span>';
				                                     echo ' <span>'."No Rent Arrears".'</span>';
				                                     echo '<div class="pull-right"><span class="small italic"></span></div>';
				                                     
				                                     echo ' </li>  ' ;
				                                     
				                                     

				                                         */
				                                         
				                                         }

					                                  

										  
										  
										  }

                                 
                                 
                                 
                                 
                                 
                                 ?>
                                 
                                 
                                 
                              
                             </ul>
                            
                            
                         </div>
                     </div>
                     <!-- END NOTIFICATIONS PORTLET-->
                 </div>
                 
                 <div class="span6">
                   
                   
                   
                   
                   
                 <!-- BEGIN CALENDAR PORTLET-->
                    <div class="widget yellow">
                         <div class="widget-title">
                             <h4><i class="icon-money"></i>Properties Overview</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                         </div>
                         <div class="widget-body">
                           <ul class="item-list scroller padding"  style="overflow: hidden; width: auto; height: 320px;" data-always-visible="1">

                           
                           
                            <li>
                                     <span class="label label-important"><i class=" icon-home"></i></span>
                                     
                                     <span class="bold">Property</span>
                                     <div class="pull-right bold">
                                     
                                     <span>Total Units</span>
                                     <span>Defined</span>
                                     <span>Occupied</span>
                                     <span>Reserved</span>
                                     <span>Vacant</span>
                                     
                                     </div>
                                     
                                     
                                 </li>
                           
                           <?php
                           include 'config.php';
                           $query1=mysql_query("SELECT * FROM properties");
                           $stat="Unoccupied";
                           $stat2="Occupied";
                           $stat3="Reserved";



                           
							if($query1)
									{//first
									
									while($row=mysql_fetch_array($query1))
									  {//while
									  
									  $prop=$row["property_name"];	
									  $pid=$row["property_id"];
									  $tunits=$row["units"];
									  
									  $query2=mysql_query("SELECT * FROM units WHERE property_id='$pid'");
									  if($query2)
									   {
									   
									   $udef		= mysql_num_rows($query2);
									   }
									   else{}
									   
									   $query3=mysql_query("SELECT * FROM units WHERE status='$stat' AND property_id='$pid'");
									   
									  if($query3)
									   {
									   
									   $vac		= mysql_num_rows($query3);
									   
									   }
									   else{echo mysql_error();}
									   
									   
									   $query4=mysql_query("SELECT * FROM units WHERE status='$stat2' AND property_id='$pid'");
									   
									  if($query4)
									   {
									   
									   $occ		= mysql_num_rows($query4);
									   
									   }
									   else{echo mysql_error();}
									   
									   $query5=mysql_query("SELECT * FROM units WHERE status='$stat3' AND property_id='$pid'");
									   
									  if($query5)
									   {
									   
									   $res		= mysql_num_rows($query5);
									   
									   }
									   else{echo mysql_error();}


									   
									   
									   
									   
									   
							echo  '		    
                            <li>
                                     <span class="label label-info"><i class=" icon-home"></i></span>
                                     
                                     <a href="properties.php"><span >'.$prop.'</span></a>
                                     <div class="pull-right ">
                                     
                                     <a href="properties.php"><span>'."Units [".$tunits."]".'</span></a>
                                     <span>'."Def [".$udef."]".'</span>
                                     <span>'."Occ [".$occ."]".'</span>
                                     <span>'."Res [".$res."]".'</span>

                                    <a href="properties.php"><span style="color:red;">'."Vac[".$vac."]".'</span></a>
                                     
                                     </div>
                                     
                                     
                                 </li> ';

									   
									   
									   

									   
									   
									  
									  
									  

 							
									  
 
									  }//while
									
									
									}//first if
							else
									{//first else
									echo mysql_error();
									
									}//first else

                           
                           
                           
                           
                           ?>
                           </ul>   


                            
                         </div>
                     </div>
                    <!-- END CALENDAR PORTLET-->  
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                 </div>
             </div>
            <div class="row-fluid">
                <div class="span6 responsive" data-tablet="span7 fix-margin" data-desktop="span7">
                    
                    
                    
                   <!-- BEGIN CHAT PORTLET-->
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-comments-alt"></i>Raised Issues</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                         </div>
                         <div class="widget-body">
                             <div class="timeline-messages">

                             
                             <?php
                            
									include 'config.php';
									
									$query1="SELECT tenants.*,tenant_issues.*,properties.*,units.* ";
									$query1.=" FROM tenant_issues LEFT JOIN tenants ON tenants.tenant_id=tenant_issues.tenant_id ";
									$query1.="LEFT JOIN units ON units.unit_id=tenant_issues.unit_id ";
									$query1.="LEFT JOIN properties ON properties.property_id=units.property_id ";
									$query=mysql_query($query1);
									if($query)
									{
									
									while($row=mysql_fetch_array($query))
									   {
									   $dates=$row["date_raised"];
									   $issue=$row["issue"];
									   $tenant=$row["tenant_name"];
									    $prop=$row["property_name"];
									     $unit=$row["unit_name"];
									   $stats=$row["category"];
									   $cell=$row["tenant_mobile"];
									   
									   $date=date('d/m/Y');
									   
									   $date1=explode(" ",$dates);
									   if($date1[0]==$date)
									     {
									     echo '
									     <div class="msg-time-chat">
                                     <a class="message-img" href="#"><img alt="" src="img/avatar2.jpg" class="avatar"></a>
                                     <div class="message-body msg-out">
                                         <span class="arrow"></span>
                                         <div class="text">
                                             <p class="attribution"><a href="tenant.php">'.$tenant." --> [".$prop.']-->['.$unit.']</a> '.$dates.'</p>
                                             <p>'.$issue." (Category) ".$stats.'</p>
                                         </div>
                                     </div>
                                 </div>';
									     
									     
									     }
									   
									   
									   
									   
									   else{}
									   
									 
									    }
									   
									       
									   
									   
									   
									}  
									 else{echo mysql_error();} 
 
                             
                             
                             
                             
                             
                             
                             
                             ?>
                                 
                                 <!-- Comment -->
                                 
                                 <!-- /comment -->
                                 
                                 
                             </div>
                               <div class="space10"></div>
                             <div class="chat-form">
                                 <div class="input-cont">
                                     <input type="text" placeholder="Type a message here..." />
                                 </div>
                                 <div class="btn-cont">
                                     <a href="javascript:;" class="btn btn-primary">Send</a>
                                 </div>
                             </div>
                             <ul style="overflow: hidden; width: auto; height: 250px;"></ul>
                         </div>
                     </div>
                     <!-- END CHAT PORTLET-->   
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <div class="span6">
                    <!-- BEGIN PROGRESS PORTLET-->
                    <div class="widget purple">
                        <div class="widget-title">
                            <h4><i class="icon-tasks"></i> Task In progress </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <ul class="unstyled"  style="overflow: hidden; width: auto; height: 320px;">
                            
                             <?php
                            
									include 'config.php';
									$query="SELECT workorders.*,properties.*,units.*,tenant_issues.* FROM workorders ";
									$query.="LEFT JOIN tenant_issues  ON tenant_issues.issue_id=workorders.issue_id ";
									$query.="LEFT JOIN units ON units.unit_id=tenant_issues.unit_id ";
									$query.="LEFT JOIN properties ON properties.property_id=units.property_id WHERE work_status='Open' ";
									$query1=mysql_query($query);                           
							if($query1)
									{//first
									
									while($row=mysql_fetch_array($query1))
									  {//while
									  
									  $sum=$row["summary"];
									   $prop=$row["property_name"];
									    $unit=$row["unit_name"];
									 $prop=$row["property_name"];
									 
									 
									 echo '
                                      
                            
                             <li>
                                    <span class="btn btn-inverse"> <i class=" icon-briefcase"></i></span> <span class="small"> '.$sum.' (@ '.$prop.' ['.$unit.']) </span> <strong class="label"> Ongoing</strong>
                                    <div class="space10"></div>
                                    <div class="progress">
                                        <div style="width: '.rand(10,100).'%;" class="bar"></div>
                                    </div>
                                </li>
                                
                                ';
                                     }//while
                                   
                                  }//first
                                 else {echo mysql_error();} 
                            
                            
                            
                            
                            ?>
                            
                                

                            </ul>
                        </div>
                    </div>
                    <!-- END PROGRESS PORTLET-->
                    
                </div>
            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2015 &copy; DesArid Co.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>

   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>