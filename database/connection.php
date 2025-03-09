<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "evoting";
$con = mysqli_connect($server,$user,$password,$dbname);
$dbconfig = mysqli_select_db($con,$dbname);
//echo $dbconfig;
if($dbconfig)
{
    //echo "Database Connection Established";
}
else
{
    echo "Databasefailed";
}
?>


