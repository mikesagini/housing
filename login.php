
<?php
/*
Simple ajax live login script by asif18.com
*/
include 'config.php';
if(isset($_SESSION['username']) && $_SESSION['username'] != ''){ // Redirect to secured user page if user logged in
	echo '<script type="text/javascript">window.location = "portal.php"; </script>';
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    
    
    <link rel="stylesheet" href="css/reset.css">


        <link rel="stylesheet" href="css/stylel.css">
        <link href="toast/css/msgPop.css" rel="stylesheet" />

    
    
    
  </head>

  <body >
  
  <div id="container">
 
    

    
<!-- Form Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <img  src="img/logo.png" style="background-color:#33b5e5;" alt="Logo" />
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>Login Portal</h2>
    <div id="login_result" class="login_result"></div>
    <form>
      <input type="text" id="lusername" placeholder="Username"/>
      <input type="password" id="lpassword" placeholder="Password"/>
      <button id="userlogin">Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create Account</h2>
     <div id="pass_rec" class="login_result"></div>

    <form>
     <select id="staffname" >
      <option selected disabled value="ID">Select Your ID</option>
      
         <?php
                                      
                                       include 'config.php';
                                       
                                       
                                        
                                       $sql="SELECT * FROM users WHERE username='' ORDER BY unational_id DESC";
                                       $sql2= mysql_query($sql);
                                       if($sql2)
                                       {
                                       while($row=mysql_fetch_array($sql2))
                                         {
                                      
                                       echo '<option value="'.$row["unational_id"].'">'.$row["unational_id"].'--'.$row["category"].'</option>';

                                          }
                                       }
                                       else
                                       {
                                       echo "<option >"."Error!"."</option>";
                                       }
                                       
                                       ?>
      
      

     

      </select >
      <input type="text" id="usename" placeholder="username"/>
      <input type="password" id="pass1"  placeholder="New Password"/>
      <input type="password" id="pass2" placeholder="Re-enter New Password"/>
     
      <button id="recover">Create Acount</button>
       

    </form>
  </div>
  <div class="cta toggles"><a href="#">Create Account</a></div>
</div>
    <script src="js/jquery-1.8.3.min.js"></script>

       <script src="js/loginindex.js"></script>
       <script src="login/login.js"></script>
       <script type="text/javascript" src="toast/js/jquery.msgPop.js"></script>
       <script type="text/javascript" src="login/passwordrecover.js"></script>
 
    
<script type="text/javascript">

$(document).ready({
//$("body").css("background-image","url(/bg/0001.png)");


});



</script>

 
    
   </div>
    
  </body>
</html>
