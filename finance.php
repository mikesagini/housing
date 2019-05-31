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
    <title>Finance</title>
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
               <a class="brand" href="index.php">
         <img src="img/logo.png" alt="Desarid Inc" /> 
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
                     Finance  & Accounting
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
                           <a href="#">Finance</a>
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
               
               
               
              <div class="row-fluid ">
                    <div class="span12">
                        <!-- BEGIN TAB PORTLET-->
                        <div class="widget widget-tabs green">
                            <div class="widget-title">
                                <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
                            </div>
                            <div class="widget-body">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs pull-left">
                                        
                                        <li><a href="#portlet_tab3" data-toggle="tab">Service Transactions</a></li>
                                        <li><a href="#portlet_tab2" data-toggle="tab">Income/Expenses</a></li>
                                        <li class="active"><a href="#portlet_tab1" data-toggle="tab">All Transactions</a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="portlet_tab1">
                                          
                                            <div class="space20"></div>
                                            <!-- BEGIN 1 SEARCH-->
                                            
                                     <div class="space10"></div>

                                            
                                            
                                            <table class="table table-striped table-hover table-bordered" id="all_transactions">
                                     <thead>
                                     <tr>
                                     
                                         <th>Trans.ID</th>
                                         <th>Recpt_No</th>
                                        <th>Tenant</th>
                                          
                                         
                                           <th>Property</th>
                                          <th>Unit</th>
                                          <th>Amount</th>
                                          <th>Date </th>
                                          <th>Balance</th>
                                         
                                          <th>Status</th>
                                          <th>Nature</th>
                                             
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>

                                            
                                            
                                            
                                            
                                            
                                            
                                            <!-- END 1 SEARCH-->

                                           
                                        </div>
                                        <div class="tab-pane" id="portlet_tab2">
                                            <h3 class="page-header">All Incomes & Expenses</h3>
                                            <div class="space20"></div>
                                            <!-- BEGIN 2 SEARCH-->
                                            
                                            
                                            
                                            
                                             
                                            <table class="table table-striped table-hover table-bordered" id="inc_expe">
                                     <thead>
                                     <tr>
                                     
                                         <th>Ref No.</th>
                                         <th>Date</th>
                                        <th>Income</th>
                                          <th>Amount</th>
                                         
                                           <th>Expense</th>
                                          <th>Amount</th>
                                          <th>Property</th>
                                          <th>Unit</th>
                                          
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>


                                            
                                            
                                            
                                            

                                            
                                            
                                            
                                            
                                            
                                            <!-- END 2 SEARCH-->
                                            <div class="space20"></div>

                                            

                                        </div>
                                        <div class="tab-pane" id="portlet_tab3">
                                           
                                            <div class="space20"></div>
                                            <!--BEGIN 3 SEARCH-->
                                            
                                             
                                             <div class="span10 ">
                                             
                                             
                                             <form id="transfile" method="post" enctype="multipart/form-data" action="importtransactions.php"> 
                                         <input type="file" name="file" id="ifile" />    
                                         <button id="trans_import"  name="trans_import"   href="" class="btn green">
                                             Import  <i class="icon-file"></i>
                                         </button>
                                        </form>
                                           </div>
                                                                                    
                                            
                                         <button id="auto_receipt"  href="" class="btn  green">
                                             Auto Receipt <i class="icon-refresh"></i>
                                         </button>
                                         
                                     
                                         


											<div class="space20"></div>
										
                                            
                                            
                                            
                                            
                                            
                                            <table class="table table-striped table-hover table-bordered" id="service_transactions">
                                     <thead>
                                     <tr>
                                     
                                         <th>Service ID</th>
                                         <th>Receipt_No</th>
                                        <th>Provider</th>
                                          <th>Code</th>
                                         
                                           <th>Date</th>
                                          <th>Account</th>
                                          <th>Amount</th>
                                          
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>


                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <!--END 3 SEARCH-->
                                            <div class="space20"></div>

                                            
                                        </div>
                                        <div class="tab-pane" id="portlet_tab4">
                                            
                                            <div class="space20"></div>
                                            <!--BEGIN 4 SEARCH-->
                                           
                                            <!--END 4 SEARCH-->
                                            <div class="space20"></div>

                                     

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB PORTLET-->
  
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
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


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>
   
   
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="toast/js/jquery.msgPop.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="application/javascript" src="js/dataTables.colVis.js"></script>
   <script src="js/dataTables.tableTools.js"></script>
   <script src="js/jquery.printelement.min.js"></script>
   
   
   
   <script src="finance/alltransactions.js"></script>
   <script src="finance/servicetransactions.js"></script>
   <script src="finance/importtransactions.js"></script>
   <script src="finance/transactionsync.js"></script>
   <script src="finance/incomeexpense.js"></script>
   <script type="text/javascript">
   
   $(document).ready(function(){
	
	$('#trans_import').click(function(){
	
	if( $("#ifile").val()=='' && $("#ifile").val()=="test.csv" )
	{
	
	return false;
	}
	
	
	else { $("#transfile").submit(); }
	
         });
     });

   </script>
   
   
   

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->


</body>
<!-- END BODY -->
</html>