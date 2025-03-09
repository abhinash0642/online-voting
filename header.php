<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "evoting";
$con = mysqli_connect($server, $user, $password, $db);
?>
<?php
include 'checkec.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Election Day</title>
  <link rel="icon" type="image/x-icon" href="images/weblogo.jpg" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="elections.css" />
  <link rel="stylesheet" href="admin/css/table.css" /> 
  <link rel="stylesheet" href="result.css" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</head>

<body>
  <div class="page">
    <div class="headerwrapper">
      <div class="pageheader">
        <div class="logowrapper">
          <a href="index.php">
            <div class="pagelogo">
              <div class="sitelogo">
                <img src="images/weblogo.jpg" alt="logo" />
              </div>
              <div class="sitetext">Election Day</div>
            </div>
          </a>
          <a class="loginbtn" href="login.php"><i class="fa fa-user icon"></i> Login</a>
        </div>
<style>
  .loginbtn{
    cursor:pointer;
  }
</style>


        <nav class="navigation-bar">
          <ul id="nav-content">
            
            <li class="nav-items">
              <a href="elections.php"><i class="fa fa-user icon"></i> Election</a>
            </li>
            <li class="nav-items">
              <a href="result.php"><i class="fa fa-user icon"></i> Results</a>
            </li>
            <li class="nav-items">
              <a href="downloads.php">
                <i class="fa fa-user icon"></i> Download
              </a>
            </li>
            <li class="nav-items">
              <a href="aboutus.php"><i class="fa fa-user icon"></i> About Us</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- add jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- <script>
        $(function() {
   $('#nav-content').find('a').click(function(e) {
       e.preventDefault();
       $(this.hash).show().siblings().hide();
       $('#nav-content').find('a').parent().removeClass('active')
       $(this).parent().addClass('active')
   }).filter(':first').click();
});
        </script> -->