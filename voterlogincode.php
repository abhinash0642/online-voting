<?php
session_start();
include 'database/connection.php';
?>


<!--Voter LOGIN CODING -->
<?php

if (isset($_POST['votersignin'])) {
 
  $voterid = $_POST['voterid'];
  $password = $_POST['password'];

  $votersearch = " select * from voters where voterid='$voterid' ";
  $query = mysqli_query($con, $votersearch);
  $email_count = mysqli_num_rows($query);

  if ($email_count) {
    $result = mysqli_fetch_assoc($query);
    $dbpassword = $result['password'];
    if ($password == $dbpassword) {
      $_SESSION['voteruid'] = $voterid;
      header('location: voter/homepage.php');
    } else {
      $_SESSION['errormsg'] = "Voterid  And Password Mismatch";
      header('location: login.php');
    }
  } else {
    $_SESSION['errormsg'] = "Voterid Doesnot Exist";
    header('location: login.php');
  }
}
?>