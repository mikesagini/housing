<?php
include 'sessions.php';
if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>404 Page</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-404">
    <div class="error-wrap error-wrap-404">
        <div class="metro big terques">
           <span> OOPS! </span>
        </div>
        <div class="metro green">
            <span> 4 </span>
        </div>
        <div class="metro yellow">
            <span> 0 </span>
        </div>
        <div class="metro purple">
            <span> 4 </span>
        </div>
        <div class="metro double red">
            <span class="page-txt"> This Page Is Coming Soon </span>
        </div>
        <div class="metro gray">
            <a href="index.php" class="home"><i class="icon-home"><p><b>Return Home<b/></p></i> </a>
        </div>

    </div>
</body>
<!-- END BODY -->
</html>