
<?php
include('connection.php');
session_start();
if($dbconfig){
    //echo "Database Connection Established";
}
else{
    header('Location: connection.php');
}


if(!$_SESSION['adminuid'])
{
    header('Location: ../login.php');
}
?>