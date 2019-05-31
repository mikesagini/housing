<?php
include 'sessions.php';

$id=$_SESSION['id'];
$date=date('d/m/Y h:i:sa');

$log="UPDATE activity_log SET log_out='$date' WHERE log_id='$id'";
if(mysql_query($log))
    {
    
session_destroy();
unset($_SESSION['type']);
unset($_SESSION['username']);
unset($_SESSION['id']);

    echo '<script type="text/javascript">window.location = "login.php"; </script>';
    
    }
else {
echo '<script type="text/javascript">window.location = "500.php"; </script>';
}



?>