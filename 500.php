
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
   <title>500 Page</title>
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
<body class="error-500">
    <div class="error-wrap">
        <h1>Ouch!</h1>
        <h2>Looks like something went wrong</h2>
        <div class="metro green">
           <span> 5 </span>
        </div>
        <div class="metro yellow">
            <span> 0 </span>
        </div>
        <div class="metro purple">
            <span> 0 </span>
        </div>
        <p>For Updates follow us on <a href="https://twitter.com/meshjeez">twitter</a> , Very soon we will fix the issue. <a href="index.php"> Return Home </a></p>
    </div>
</body>
<!-- END BODY -->
</html>