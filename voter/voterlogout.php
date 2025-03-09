<?php
session_start();


if(!$_SESSION['voteruid'])
{
    header('Location: ../login.php');
}
?>
 <?php
$server = "localhost";
$user = "root";
$password = "";
$db = "evoting";
$con = mysqli_connect($server,$user,$password,$db);

if(isset($_POST['logoutbtn'])){
      session_destroy();
      unset($_SESSION['voteruid']);
      header('Location: ../login.php');
 }
 
?>
