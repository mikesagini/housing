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
    <title>Tenancy</title>
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
                     Tenants & Tenancy Data
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
                           Tenants
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
                        <div class="widget widget-tabs purple">
                            <div class="widget-title">
                                <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
                            </div>
                            <div class="widget-body">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs pull-left">
                                        <li><a href="#portlet_tab4" data-toggle="tab">Tenant Messages Archive</a></li>
                                        <li><a href="#portlet_tab3" data-toggle="tab">Issues & Requests</a></li>
                                        
                                        
                                        <li><a href="#portlet_tab2" data-toggle="tab">Tenancy Management</a></li>
                                        <li class="active"><a href="#portlet_tab1" data-toggle="tab">Tenants Info</a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div class="tab-content">
                                         <div class="tab-pane active" id="portlet_tab1">
                                          <h3 class="page-header center">Tenants Basic Information</h3>
                                          
                                            <div class="space20"></div>
                                            <!-- BEGIN plot SEARCH-->
                                            
                                            
                                            
                                         <div class="btn-group">
                                         <button id="new_tenant" data-toggle="modal"  href="" class=" btn">
                                             New Tenant <i class="icon-plus"></i>
                                         </button>
                                         

                                     </div>
                                     <div class="space10"></div>
                                     
                                          <table class="table table-striped table-hover table-bordered" id="all_tenants">
                                     <thead>
                                     <tr>
                                     
                                         <th>Tenant ID</th>
                                         <th>Full Name</th>
                                         <th>National ID</th>
                                          <th>Address</th>
                                          <th>County</th>
                                          <th>Mobile</th>
                                           <th>Property</th>
                                          <th>Unit</th>
                                          <th>Status</th>
                                          <th>Date added</th>
                                             
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>
                                            
                                            
                                            <!-- END 1 SEARCH-->

                                           
                                        </div>
                                        <div class="tab-pane" id="portlet_tab2">
                                            <h3 class="page-header center">Advanced Information</h3>

                                            <div class="space20"></div>
                                            <!-- BEGIN 2 SEARCH-->
                                            
                                            
                                                <table class="table table-striped table-hover table-bordered" id="tenant_manager">
                                     <thead>
                                     <tr>
                                     
                                         <th>Tenant ID</th>
                                         <th>Name</th>
                                           <th>Property</th>
                                           <th>Unit</th>
                                           <th>Last Payment Date</th>
                                           <th>Amount</th>
                                           <th>Balance</th>
                                           <th>Status</th>
                                             
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>

                                            
                                            
                                            <!-- END 2 SEARCH-->
                                            <div class="space20"></div>

                                            

                                        </div>
                                        <div class="tab-pane" id="portlet_tab3">
                                           
                                           <h3 class="page-header center">Tenants Issues & Concerns </h3>

                                            <div class="space20"></div>
                                            <!-- BEGIN 2 SEARCH-->
                                            
                                            
                                                <table class="table table-striped table-hover table-bordered" id="tenant_issues">
                                     <thead>
                                     <tr>
                                     
                                         <th>I_ID</th>
                                         <th>Name</th>
                                         <th>Property</th>
                                         <th>Unit</th>
                                           <th>Issue</th>
                                           <th>Category</th>
                                           <th>Date Raised</th>
                                           <th>Issue Status</th>
                                           
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

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
                                           
                                           
                                           
                                           
                                           <h3 class="page-header center">All  Messages Archive</h3>

                                            <div class="space20"></div>
                                            <!-- BEGIN 2 SEARCH-->
                                            
                                            
                                                <table class="table table-striped table-hover table-bordered" id="tenant_messages">
                                     <thead>
                                     <tr>
                                     
                                         <th>Message ID</th>
                                         <th>Tenant</th>
                                           <th>Phone</th>
                                           <th>Property</th>
                                           <th>Unit</th>
                                           <th>Type</th>
                                           <th>Message</th>
                                           <th>Date</th>
                                           <th>Priority</th>
                                             
                                                                                    
                                                                                         
                                                                                              

                                               
                                                

									 </tr>
                                     </thead>
                                     <tbody>
                                     
                                     </tbody>
                                     
                                     
                                 </table>

                                            

                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                            <!--END 4 SEARCH-->
                                            <div class="space20"></div>

                                     

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB PORTLET-->
  
               
               
                              <!-- properties modal -->


<div id="tenants_mod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 id="myModalLabel4">Tenant Information</h3>
                                </div>
                                <div class="modal-body">
                                    <div id="message"></div>
                                    
                     
                     
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
            ,"Machakos","Makueni","Mandera","Marsabit","Meru","Migori","Mombasa","Murangâ€™a","Nairobi"," Nakuru","Nandi"
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
                                        
                                         include 'config.php';
                                       $sql=mysql_query("SELECT * FROM properties ORDER BY property_name ASC");
                                       
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
                                    <button class="btn btn-success"  type="submit" data-dismiss="modal" id="addtenant">New</button>
                                    <button class="btn btn-primary"  type="submit" data-dismiss="modal" id="edittenant">Edit</button>                      
                                    <button class="btn btn-danger" type="reset">Clear</button>
                                </div>



                            </form>

                                    
                                    
                     
                     
                                    
                                    
                                </div>
                               
                            </div>




<!--tenants modal -->

               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
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
   
   
   
   <script src="tenancy/tenantinfo.js"></script>
   <script src="tenancy/tenantmanipulation.js"></script>
   <script src="tenancy/tenantmanager.js"></script>
   <script src="tenancy/tenantissues.js"></script>
   <script src="tenancy/tenantmessages.js"></script>
   
   
   

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  
  
  
  
  
  
  
  
  
  <!-- END JAVASCRIPTS -->
  
  
  
  
  


</body>
<!-- END BODY -->
</html>