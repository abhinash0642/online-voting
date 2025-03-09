<?php
session_start();
?>
<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "evoting";
$con = mysqli_connect($server, $user, $password, $db);


if(!$_SESSION['voteruid'])
{
    header('Location: ../login.php');
}
?>