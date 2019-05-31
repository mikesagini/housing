
<?php
include 'sessions.php';

if(!isset($_SESSION['uname']) || $_SESSION['uname'] == '')
 
  {
  
  
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
	return false;
  }
 
  
else  if($_SESSION['category'] =="tenant" || $_SESSION['category'] =="administrator" || $_SESSION['category'] =="caretaker" || $_SESSION['category'] =="owner" ){
	
}




else  if($_SESSION['category'] !="tenant" && $_SESSION['category'] !="administrator" && $_SESSION['category'] !="caretaker" && $_SESSION['category'] =="owner" ){

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
    <title>Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
    
    
     <link href="toast/css/msgPop.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
   <link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css" />
   <link rel="stylesheet" type="text/css" href="css/dataTables.colVis.css" />
   <link rel="stylesheet" href="css/printout.css" type="text/css" media="print" />
   <!--<link rel="stylesheet" href="digitalclock/clock.css" type="text/css" />-->



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
               <a class="brand" href="#">
                 <img src="img/logo.png" alt="logo Lab" />
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
                               <li><a href="logouts.php"><i class="icon-key"></i> Log Out</a></li>
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
      <div class="sidebar-scroll
      
      <?php
                      
                                include 'config.php';
                                $cat= $_SESSION['category'];
                                
                                if($cat!="administrator")
                                
                                {echo " hidden";} ?> "

      
      
      
      >
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
                  <a class="" href="#">
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
                      <li><a href="portal.php" class="">Tenant Portal</a></li>
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
                     Portals
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Alfonse Housing Ltd</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Portals
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
              <!-- BEGIN real-->
            <div class="row-fluid">
               <!-- BEGIN INTRO PORTLET-->
                     <div class="widget blue">
                         
                         <div class="widget-body">
                            <h3 class="text-center">Welcome to Alfonse Housing Agency.Please click on Options below to Access Information.</h4>
                         </div>
                     </div>
                     <!-- INtro PORTLET-->

               
               
              <div class="row-fluid ">
                    <div class="span12">
                        <!-- BEGIN TAB PORTLET-->
                        <div class="widget widget-tabs blue">
                            <div class="widget-title">
                                <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
                            </div>
                            <div class="widget-body">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs pull-left">
                                      <li class="dropdown ">
                                            <a data-toggle="dropdown"  class="dropdown-toggle  
                                            
                                            
                                             <?php
                      
                                include 'config.php';
                                $cat= $_SESSION['category'];
                                
                                if($cat!="administrator" && $cat!="caretaker")
                                
                                {echo " hidden";} ?> "
                                            


											 href="#" style="color: black;">Caretaker Options<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a data-toggle="tab" href="#dropdown4">Raised Issues</a></li>
                                                <li><a data-toggle="tab" href="#dropdown5">Add Tenant</a></li>
                                                <li><a data-toggle="tab" href="#dropdown6">Tenant List</a></li>

                                            </ul>
                                        </li>
                                    
                                    
                                         <li class="dropdown active ">
                                            <a data-toggle="dropdown" class="dropdown-toggle
                                            
                                            
                                             <?php
                      
                                include 'config.php';
                                $cat= $_SESSION['category'];
                                
                                if($cat!="administrator" && $cat!="tenant")
                                
                                {echo "hidden";} ?> 

                                            
                                            
                                            
                                            
                                            " href="#" style="color: black;">Tenant Options<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a data-toggle="tab" href="#dropdown1">Make Request</a></li>
                                                <li><a data-toggle="tab" href="#dropdown2">View Messages</a></li>
                                                <li><a data-toggle="tab" href="#dropdown3">Rent Report</a></li>

                                            </ul>
                                        </li>
                                        
                                         <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle
                                            
                                            
                                             <?php
                      
                                include 'config.php';
                                $cat= $_SESSION['category'];
                                
                                if($cat!="administrator" && $cat!="owner")
                                
                                {echo "hidden";} ?> 

                                            
                                            
                                            
                                            
                                            " href="#" style="color: black;">Owner Options<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                
                                                <li><a data-toggle="tab" href="#dropdown7">Property occupation</a></li>
                                                <li><a data-toggle="tab" href="#dropdown8">All Filed Expenses</a></li>
                                                
                                                <li><a data-toggle="tab" href="#dropdown9">Income /expense reports </a></li>




                                            </ul>
                                        </li>
                                       


                                        
                                        
                                        
                                       

                                    </ul>
                                    <div class="clearfix"></div>
                                    
                                    
                                    <div class="tab-content">
                                    
                                        <!--Tenant portal---------------------------------------------->
                                        
                                          <div id="dropdown1" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">Request</h3>
                                            
                                            
                                           
                                            
                                            
                                            <!--BEGIN -->
                                          <div class="span5">
                                          
                                          
                                          </div>  
                                            
                                           <div class="btn-group">
                                         <button id="new_req" data-toggle="modal"  href="" class="btn btn-primary">
                                             Make Request <i class=" icon-question"></i>
                                         </button>
                                         

                                     </div>
                                     
                                      <div class="space20"></div>
                                     
                                     
                                     <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">
                                             
                                             
                                              <li>
                                     <span class="label label-info"><i class="  icon-info"></i></span>
                                     <span>All your previous requests will be displayed here...</span>
                                     
                                     
                                     
                                               </li>
                                               
                                               
                                               
                                               
                                                                                
                                 <?php
                                 
                                 include 'config.php';
                                $nid= $_SESSION['n_id'];
                                
                                 $query=mysql_query("SELECT tenants.*,tenant_issues.* FROM tenant_issues LEFT JOIN tenants ON tenants.tenant_id=tenant_issues.tenant_id WHERE tnational_id='$nid' ORDER BY date_raised DESC ");
                                 if($query)
									{
									
																		   
									  
									
									while($row=mysql_fetch_array($query))
									   {
									   
									   $msg=$row["issue"];
									   $dat=$row["date_raised"];
									   $stat=$row["issue_status"];
									   $date=$row["approval_date"];
									   echo'
									   
									   
                                 
                                 <li>
                                     <span class="label label-success"><i class="icon-hand-up"></i></span>
                                     <span>'.$msg.'</span>
                                     --><span class="small italic ">ON['.$dat.']</span>
                                     ';
                                     if($stat=="Pending")
                                       {
                                       echo '--><span class="small italic ">Queued,Please wait</span></li>';
                                       
                                       }
                                       
                                       else {
                                       echo '
                                     
                                  --><span class="small italic ">Approved['.$date.']</span>

                                     
                                 </li>';  }
									   
									   

									   }
									   
									}
									else{echo mysql_error();}  									  
									  
									
								
								
									  
									  
									   
									   

                                 
                                 
                                 
                                 
                                 
                                 ?>

                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                           </ul>    


                                            
                                             <div class="space10"></div>
                             <a href="#" class="pull-right">All Requests</a>
                             <div class="clearfix no-top-space no-bottom-space"></div>

                                            
                                            
                                            
                                            
                                            
                                            
                                            <!--end-->
                                                                                                           
                                        
                                        </div>
                                        
                                        
                                     <div id="dropdown2" class="tab-pane fade">
                                        
                                       
                                        <h3 class="page-header">My Messages</h3>
                                            
                                            
                                            <div class="space10"></div>
                                            <!--BEGIN -->
                                            <ul class="item-list scroller padding"  style="overflow:  auto; width: auto; height: 1000px;" data-always-visible="1">
                                             
                                             
                                              <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>All your messages will be displayed here...</span>
                                     
                                     
                                     
                                               </li>
                           
                                 
                                 
                                 
                                 <?php
                                 
                                 include 'config.php';
                                $nid= $_SESSION['n_id'];
                                
                                 $query=mysql_query("SELECT tenants.*,tenant_messages.* FROM tenant_messages LEFT JOIN tenants ON tenants.tenant_id=tenant_messages.tenant_id WHERE tnational_id='$nid' ORDER BY msg_date DESC ");
                                 if($query)
									{
									
																		   
									  
									
									while($row=mysql_fetch_array($query))
									   {
									   
									   $msg=$row["message"];
									   $dat=$row["msg_date"];
									   
									   echo'
									   
									   
                                 
                                 <li>
                                     <span class="label label-success"><i class="icon-envelope"></i></span>
                                     <span>'.$msg.'</span>
                                     <div class="pull-right">
                                         <span class="small italic "></span>

                                     </div>
                                 </li>';
									   
									   

									   }
									   
									}
									else{echo mysql_error();}  									  
									  
									
								
								
									  
									  
									   
									   

                                 
                                 
                                 
                                 
                                 
                                 ?>
                                 
                                 
                              
                             </ul>
                             <div class="space10"></div>
                             <a href="#" class="pull-right">All Messages</a>
                             <div class="clearfix no-top-space no-bottom-space"></div>
                             
                         </div>

                                                                                                           
                                        
                                        
                                        
                                        
                                        <div id="dropdown3" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">Rent Report</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                               <ul class="item-list scroller padding"  style="overflow:  auto; width: auto; height: 1000px;" data-always-visible="1">

                                            
                                            
                                            <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>This is your payment history...</span>
                                     
                                     
                                     
                                               </li>
                                               
                                                  <?php
                                 
                                 include 'config.php';
                                $nid= $_SESSION['n_id'];
                                
                                 $q="SELECT service_transactions.*,all_transactions.*,tenants.* FROM all_transactions ";
                                 $q.="LEFT JOIN tenants ON tenants.tenant_id=all_transactions.tenant_id "; 
                                 $q.="LEFT JOIN service_transactions ON service_transactions.service_id=all_transactions.service_id ";
                                 $q.=" WHERE tnational_id='$nid' AND receipt_no!='' ORDER BY trans_date DESC ";
                                 
                                 $query=mysql_query($q);
                                 if($query)
									{
									
																		   
									  
									
									while($row=mysql_fetch_array($query))
									   {
									   
									   $date=$row["trans_date"];
									   $rec=$row["receipt_no"];
									   $amnt=$row["amount"];
									   
									   echo '
									   
									   <li>
                                     <span class="label label-mini"><i class="icon-dollar"></i></span>
                                     <span >Rno.['.$rec.']</span>--Ksh.
                                     <span >'.$amnt.'</span>
                                     <span class="small italic" >@ '.$date.'</span>
                                     
                                     <div class="pull-right">
                                         <span class="small italic "></span>

                                     </div>
                                 </li>';


                                               
                                               
                                               
                                          }     
                                               
                                      }
                                     else{ echo mysql_error();}         
                                               
                                               
                                               
                                               

                                           

                                              ?>


                                            </ul>               
                                        
                                        </div>


                                        
                                        
                                        <!--tenant--------------------------------------------Portal-->
                                        
                                        <!--caretaker--------------------------------------------Portal-->
 
							
								
                                    <div id="dropdown4" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">My Tenants'  Issues</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                            
                                            
                                             <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">
                                             
                                             
                                              <li>
                                     <span class="label label-inverse"><i class=" icon-info"></i></span>
                                     <span>All your tenant issues will be displayed here...</span>
                                     
                                     
                                     
                                               </li>
                           
                                 
                                 
                                 
                                    <?php
                                 
                                 include 'config.php';
                                 
                                $nid= $_SESSION['n_id'];
                                
                                 $query="SELECT caretakers.*,tenant_issues.*,properties.*,units.*";
                                 $query.="FROM tenant_issues LEFT JOIN units ON tenant_issues.unit_id=units.unit_id ";
                                 $query.="LEFT JOIN properties ON properties.property_id=units.property_id ";
                                 $query.="LEFT JOIN caretakers ON  caretakers.caretaker_id=properties.caretaker_id ";
                                 
                                 
                                 $query.="WHERE cnational_id='$nid'  ";
                                 $query1=mysql_query($query);
                                 
                                 if($query1)
									{
									
																		   
									  
									
									while($row=mysql_fetch_array($query1))
									   {
									   
									   $msg=$row["issue"];
									   $dat=$row["date_raised"];
									   $prop=$row["property_name"];
									    $unit=$row["unit_name"];
									    $cat=$row["category"];
									    $stat=$row["issue_status"];
									    $iid=$row["issue_id"];
									    
									   if($stat=="Approved")
									     {


                              echo'
									
									   
                                 
                                 <li>
                                 
                                     <span class="label label-success"><i class="icon-hand-right"></i></span>
                                     <span>'.$msg.'-->'.$cat.'</span>
                                                                           
                                     --<span class="small italic ">'.$prop.'</span>
                                         --<span class="small italic ">Unit['.$unit.']</span>
                                        -- <span class="small italic ">'.$dat.'</span>
                                        -- <span>Approved</span>
                                                                              
                                 </li>';
                                 }
                                         
                                         else if($stat=="Pending"){
                                       
                                         echo '
                                          <li>
                                   <input class="" id="issr" name="" value="'.$iid.'"  type="hidden" /> 
                                     <span class="label label-success"><i class="icon-hand-right"></i></span>
                                     <span>'.$msg.'-->'.$cat.'</span>
                                                                           
                                     --<span class="small italic ">'.$prop.'</span>
                                         --<span class="small italic ">Unit['.$unit.']</span>
                                         --<span class="small italic ">'.$dat.'</span>
                                         
                                         <span><button class="btn btn-mini btn-primary" href="" id="appr">Approve</button></span>                                                                              
                                 </li>';

                                      
									   }
									   else{}
									   

									   }//while
									   
									}//if
									else{echo mysql_error();}  									  
									  
									
								
								
									  
									  
									   
									   

                                 
                                 
                                 
                                 
                                 
                                 ?>
                                 
                              
                             </ul>
                             <div class="space10"></div>
                             

                                                           
                                         <!--END -->
                                        </div>
									
										
										<div id="dropdown5" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">Add A Tenant</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->

										
										
										
										            <form class="cmxform form-horizontal" name="tenantinfo" id="tenantinfo" method="post" action="">
                              
                                
                                      <div class="control-group ">
                                    <label for="" class="control-label ">Tenant's Name</label>
                                    <div class="controls">
                                        <input class="span6 "   id="tname" name="" minlength="2" type="text" required />
                                  <span class="help-inline" id="t1"></span> 
							 </div>
                                </div>
                                
                                 <div class="control-group">
                                <label class="control-label">National ID</label>
                                <div class="controls">
                             <input class="span6" id="tnid" name="" maxlength="8"  type="text" required />

                              <span class="help-inline" id="i1"></span> 
                          </div>
                            </div>
                                
                                <div class="control-group ">
                                    <label for="" class="control-label ">Address / Location</label>
                                    <div class="controls">
                                        <input class="span6 "  id="tadd" name="" minlength="2" type="text" required />
                                  <span class="help-inline" id="a1"></span> 
							 </div>
                                </div>
                                
                                
                                 <div class="control-group">
                                <label class="control-label">County</label>
                                <div class="controls">
                                    <select class="span6" data-placeholder="Choose a County" tabindex="1" id="tcounty" required>
                                    <option value=""></option>
                                       <?php


$coun=array("Baringo","Bomet","Bungoma","Busia","Elgeyo_Marakwet","Embu","Garissa","Homa_Bay","Isiolo","Kajiado"
            ,"Kakamega","Kericho","Kiambu","Kilifi","Kirinyaga","Kisii","Kisumu","Kitui","Kwale","Laikipia","lamu"
            ,"Machakos","Makueni","Mandera","Marsabit","Meru","Migori","Mombasa","Muranga","Nairobi"," Nakuru","Nandi"
            ,"Narok","Nyamira","Nyandarua","Nyeri","Samburu","Siaya","Taita_Taveta","Tana River","Tharaka_Nithi"
            ,"Trans_Nzoia","Turkana","Uasin_Gishu","Vihiga","Wajir","West_Pokot");
 $county=count($coun);
 
 for($i=0;$i<$county;$i++)
    {
    echo '<option  value="'.$coun[$i].'">'.$coun[$i].'</option>';
    
    }



?>


                                        
                                    </select>
                              <span class="help-inline" id="cou1"></span> 
                          </div>
                            </div>
                            
                            
                            
                               <div class="control-group">
                                <label class="control-label">Mobile</label>
                                <div class="controls">
                             <input class="span6" id="tmob" name="" maxlength="10" type="text" required />

                              <span class="help-inline" id="mo1"></span> 
                          </div>
                            </div>


                                   <div class="control-group ">
                                    <label for="cname" class="control-label">Property Interested</label>
                                    <div class="controls">
                                        <select class="span6 " data-placeholder="Select property" tabindex="1" id="tprop" onchange="AjaxFunction();" name="ptenant" required>
                                        <option value=""></option>
                                       <?php
                                       
                                       $nid=$_SESSION['n_id']; 
                                        
                                         include 'config.php';
                                       $q="SELECT properties.*,caretakers.* FROM properties LEFT JOIN ";
                                       $q.=" caretakers ON caretakers.caretaker_id=properties.caretaker_id ";
                                       
                                       $q.=" WHERE cnational_id='$nid' ORDER BY property_name ASC ";
                                       $sql=mysql_query($q);
                                       
                                       if($sql)
                                       {
                                       while($row=mysql_fetch_array($sql))
                                        {
                                      
                                      
                                       echo '<option value="'.$row['property_id'].'">'.$row['property_name'].' (ID) '.$row['property_id'].' '.'</option>';
                                                                           
                                        }
                                       }
                                       else
                                       {
                                       echo "<option value=\"name\">"."Error!"."</option>";
                                       }
                                       
                                       ?>                                       </select>

                                   <span class="help-inline" id="p1"></span>
								 </div>
                                </div>
                                
                           <div class="control-group ">
                                    <label for="cname" class="control-label">Unit</label>
                                    <div class="controls">
                                 

                                        <select class="span6" data-placeholder="Select owner" tabindex="1" id="tunit" name="tunit" required>
                                        
											   <option  value=""></option>
										 </select>

                                   <span class="help-inline" id="u1"></span>
								 </div>
                                </div>
                                
                                
                         <div class="control-group">
                                <label class="control-label">Expected Rent & Lipa Kodi A/C [Paybill-<b>15158</b>] </label>
                                <div class="controls">
                             <input class="span3" id="rrent" name="rrent" onkeydown="return false;" placeholder="Rent" maxlength="10" type="text" required />
                             <input class="span3" id="aacc" name="aacc" onkeydown="return false;" placeholder="Lipa A/C" maxlength="10" type="text" required />
                             <input type="hidden"  id="cuser" value="<?php echo $_SESSION['uid'];?>" />

                              <span class="help-inline" id="mo1"></span> 
                          </div>
                            </div>



                                       
     
                               
                                
                                

                              
                                 <div class="form-actions">
                                    <button class="btn btn-success span2"  type="submit" data-dismiss="modal" id="addtenant">New</button>
                                    <button class="btn btn-primary span2"  type="submit" data-dismiss="modal" id="edittenant">Edit</button>                      
                                    <button class="btn btn-danger span2" type="reset">Clear</button>
                                </div>



                            </form>

										
									</div>		
												
												
												
												<div id="dropdown6" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">All Tenants</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                             <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">

                                            
                                            

                                            
                                            
                                            <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>All your tenants and their contact</span>
                                     
                                     
                                     
                                               </li>


                                            
                                               <?php
                                 
                                 include 'config.php';
                                 
                                $nid= $_SESSION['n_id'];
                                
                                 $query="SELECT tenants.*,properties.*,units.*,caretakers.*";
                                 $query.="FROM tenants LEFT JOIN units ON tenants.unit_id=units.unit_id ";
                                 $query.="LEFT JOIN properties ON properties.property_id=units.property_id ";
                                 $query.="LEFT JOIN caretakers ON  caretakers.caretaker_id=properties.caretaker_id ";
                                 
                                 
                                 $query.="WHERE cnational_id='$nid'  ";
                                 $query1=mysql_query($query);
                                 
                                 if($query1)
									{
									
										
									while($row=mysql_fetch_array($query1))
									   {
									   
									   $prop=$row["property_name"];
									   $unit=$row["unit_name"];
									   $ten=$row["tenant_name"];
									   $cell=$row["tenant_mobile"];



									   
									   
                              echo'
									
									   
                                 
                                 <li>
                                   
                                     <span class="label label-success label-mini"><i class="icon-user"></i></span>
                                     <span>'.$ten.'--></span>
                                     
                                      
                                     <span class="small italic ">'.$prop.'</span>
                                         <span class="small italic ">Unit['.$unit.']</span>
                                         <span class="small italic ">'.$cell.'</span>
                                         ';

									   
									   
									    }
	
                                    


                                     }
                                     
                                     else{echo mysql_error();}
                                     
        
                                            
                                            
                                            
                                            
                                            
                                         ?>  
                                         

												</ul>		 
                                            
                                            </div>

												
												
												
												
												
												
												
												
												
												
												
												
												<!--caretaker--------------------------------------------Portal-->




													<!--owner--------------------------------------------Portal-->
														<div id="dropdown7" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">Property Occupation</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                             <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">

                                            
                                            

                                            
                                            
                                            <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>My properties </span>
                                     
                                     
                                     
                                               </li>
                                               
                                               <?php
                                               
                           include 'config.php';
                              $nid= $_SESSION['n_id'];
                           
                           $query1=mysql_query("SELECT properties.*,owners.* FROM properties LEFT JOIN owners ON properties.owner_id=owners.owner_id WHERE onational_id='$nid'");
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
                                     <span class="label label-important label-small"><i class=" icon-home"></i></span>
                                     
                                     <a href="#"><span >'.$prop.'</span></a>
                                    
                                    -- 
                                     <a href="units.php"><span>'."Units [".$tunits."]".'</span></a>
                                    -- <span>'."Def [".$udef."]".'</span>
                                    -- <span>'."Occ [".$occ."]".'</span>
                                    -- <span>'."Res [".$res."]".'</span>

                                    -- <span style="color:red;">'."Vac[".$vac."]".'</span>
                                     
                                     
                                     
                                     
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
													
								
 
									<div id="dropdown8" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">All Filed Expenses</h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                             <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">

                                            
                                            

                                            
                                            
                                            <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>All open and closed workorders </span>
                                     
                                     
                                     
                                               </li>

													
												
                                            
                                               <?php
                                 
                                 include 'config.php';
                                 
                                $nid= $_SESSION['n_id'];
                                
                                 $query="SELECT tenant_issues.*,properties.*,units.*,owners.*,workorders.*";
                                 $query.="FROM workorders LEFT JOIN tenant_issues ON tenant_issues.issue_id=workorders.issue_id ";
                                 
                                 $query.=" LEFT JOIN units ON tenant_issues.unit_id=units.unit_id ";
                                 $query.="LEFT JOIN properties ON properties.property_id=units.property_id ";
                                 $query.="LEFT JOIN owners ON  owners.owner_id=properties.owner_id ";
                                 
                                 
                                 $query.="WHERE onational_id='$nid'  ";
                                 $query1=mysql_query($query);
                                 
                                 if($query1)
									{
									
										
									while($row=mysql_fetch_array($query1))
									   {
									   
									   $prop=$row["property_name"];
									   $unit=$row["unit_name"];
									   $sum=$row["summary"];
									   $stat=$row["work_status"];
									   $cost=$row["work_cost"];
									    $date1=$row["date_opened"];
									  $date=explode(" ",$date1);



									   
									   
                              echo'
									
									   
                                 
                                 <li>
                                   
                                     <span class="label label-success label-mini"><i class="icon-briefcase"></i></span>
                                    
                                     
                                      
                                     <span class="small italic ">'.$prop.'</span>
                                         --<span class="small italic ">Unit['.$unit.']</span>
                                         --<span class="small italic ">'.$sum.'</span>
                                          --<span class="small italic ">Ksh.'.$cost.'</span>
                                          --<span class="small italic ">'.$stat.'</span>
                                           <span class="small italic ">('.$date[0].')</span>

                                         ';

									   
									   
									    }
	
                                    


                                     }
                                     
                                     else{echo mysql_error();}
                                     
        
                                            
                                            
                                            
                                            
                                            
                                         ?>


													</ul>
													

                         </div>	
                         
                         
                         	<div id="dropdown9" class="tab-pane fade">
                                        
                                        
                                        <h3 class="page-header">All Income  and Expenses </h3>
                                            
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN -->
                                             <ul class="item-list scroller padding"  style="overflow: auto; width: auto; height: 1000px;" data-always-visible="1">

                                            
                                            

                                            
                                            
                                            <li>
                                     <span class="label label-info"><i class=" icon-info"></i></span>
                                     <span>This is all your yearly income and expenses </span>
                                     
                                     
                                     
                                               </li>
                                               
                                                  
                                               <?php
                                 
                                 include 'config.php';
                                 
                                $nid= $_SESSION['n_id'];
                                $inco=0;
								$expo=0;
                                
                                 $query="SELECT income_expense.ie_date,income_expense.inc_amount,income_expense.exp_amount,properties.*,owners.* ";
                                 $query.=" FROM income_expense LEFT JOIN properties ON properties.property_id=income_expense.property_id ";
                                 $query.=" LEFT JOIN owners ON owners.owner_id=properties.owner_id WHERE onational_id='$nid' ";
                                  $query1=mysql_query($query);
								if($query1) {
								
									
		                                     
								 while($row2=mysql_fetch_array($query1))
                                    
                                      {
                                     
                                      $iedate=$row2["ie_date"];
                                      $inc=$row2["inc_amount"];
                                      $exp=$row2["exp_amount"];
                                       $prop=$row2["property_name"];

                                          
                                      $date11=explode(" ",$iedate);
                                        
                                      $date90=explode("/",$date11[0]);
                                      
                                      $month=$date90[1];
                                      $year=$date90[2];
                                   
                                      //echo'<script type="text/javascript">alert('.$exp.');</script>';
                                  
                                      if($month==11){
                                       if($inc!='-')
                                          {$inco+=$inc;}
                                          
                                            
                                      if($exp!='-'){
                                     
                                      $expo+=$exp;}
                                         
                                         
                                        
                                      
                                      
                                      
                                      }
                                      else{}
                                     
                                      
                                    
                                    

                                      
                                      
                                   
                                      
                                       }//while
                                       
                                       
                                         echo'
									
									   
                                 
                                 <li>
                                   
                                     <span class="label label-success label-mini"><i class="icon-euro"></i></span>
                                     <span>'.$prop.'--</span>
                                     
                                     <span>Month['.$month.']--</span>
                                     
                                      
                                     <span class="small italic ">Year['.$year.']--</span>
                                         <span class="small italic ">Expenses['.$expo.']--</span>
                                         <span class="small italic ">Income['.$inco.']</span>
                                         ';
                                      
 
                                       
                                       
                                  }//if
                                  else{echo mysql_error();}


													
												?>


													</ul>
													

                         </div>	
					

					
													
													
													
													
													
													
													
													
													
													<!--owner--------------------------------------------Portal-->


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB PORTLET-->
             <div class="widget blue">
                         
                         <div class="widget-body">
                            <h3 class="text-center bold">Terms And Conditions Apply</h4>
                         </div>
                     </div>
               
               
               
               <!-- units modal -->


<div id="req_mod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 id="myModalLabel4">Make Request</h3>
                                </div>
                                <div class="modal-body">
                                    <div id="message"></div>
                                    
                     <form class="cmxform form-horizontal" id="prop" method="post" action="">
                              
                                
                                      <div class="control-group ">
                                    <label for="" class="control-label ">Issue(summarized)</label>
                                    <div class="controls">
                           <textarea class="span6 " maxlength="20" placeholder="Type your issue here" rows="3"  id="iss" name="" required></textarea>
                            <input type="hidden" value="<?php echo $nid= $_SESSION['n_id']; ?>" id="nid">
                                  <span class="help-inline" id="i2"></span> 
							 </div>
                                </div>
                                
                                
                                  <div class="control-group ">
                                    <label for="cname" class="control-label">Category</label>
                                    <div class="controls">
                                        <select class="span6" data-placeholder="Select owner" tabindex="1" id="catg" required>
                                        <option value=""></option>
                                         <option value="general">General</option>
                                        <option value="maintanance">Maintanance</option>
                                        <option value="complaint">Complaint</option>
                                        <option value="endlease">Termination Notice</option>
                                      



                                    </select>

                                   <span class="help-inline" id="c2"></span>
								 </div>
                                </div>
                                
                               

                                  
                              
                                 <div class="form-actions">
                                    <button class="btn btn-success "  type="submit" data-dismiss="modal" id="makereq">Send Request</button>
                                                         
                                    <button class="btn btn-danger " type="reset">Clear</button>
                                </div>



                            </form>

                                    
                                    
                                    
                                    
                                </div>
                               
                            </div>




<!--units modal -->

               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               </div>  
            </div>
            
            <!-- END real-->
            

            

         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
</div>

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2015 &copy; DesArid Co.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   
   
   
   
      <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="toast/js/jquery.msgPop.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="application/javascript" src="js/dataTables.colVis.js"></script>
   <script src="js/dataTables.tableTools.js"></script>
   <script src="js/jquery.printelement.min.js"></script>

   
   


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>
   
   <script src="portal/tenantrequest.js"></script>
   <script src="portal/approveissue.js"></script>
   
   <script src="portal/tenantmanipulation.js"></script>
   
   
   
   
   

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->


</body>
<!-- END BODY -->
</html>