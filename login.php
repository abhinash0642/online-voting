<?php
session_start();
include 'database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In </title>
  <!-- Main css -->
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div id="login-container">
    <div class="signinbody">
      <div class="buttonbox">
        <div id="btn" style="left: 0%;"></div>
        <button class="togglebtn" onclick="leftclick()">User</button>
        <button class="togglebtn" onclick="rightclick()">Admin</button>
      </div>

      <div class="signinform">
        <h2 id="form-title">Voter Login</h2>
        <!-- Voter Signin Form-->
        <div class="voter-signin-form" id="votershow">
          <div class="alertcontainer">

            <?php

            if (isset($_SESSION['errormsg']) && $_SESSION != '') {
            ?>
              <h2 class="status errorstatus">
                <?php
                echo $_SESSION['errormsg'];
                unset($_SESSION['errormsg']);
                ?>
              </h2>
            <?php
            }
            ?>
          </div>

          <form action="voterlogincode.php" method="POST">
            <div class="form-group">
              <label for="vId">Voter Id</label>
              <input type="text" class="input-field" id="vId" name="voterid" placeholder="Enter Voter Id" required>
            </div>

            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" id="pwd" name="password" required>
            </div>

            <div class="textcontainer">
              <a href="resetpassword.php">Forgot Password ?</a>
            </div>

            <button type="submit" name="votersignin" id="votersignin" class="form-submit">LOGIN</button>

          </form>

          <p class="signuplabel"> Create Your Voter Account <a href="register.php">SignUp</a></p>
        </div>

        <!--Admin Signin Form-->
        <div class="admin-signin-form" id="adminshow">
          <div class="alertcontainer">

            <?php
            if (isset($_SESSION['errormsg']) && $_SESSION != '') {
            ?>
              <h2 class="status errorstatus">
                <?php
                echo $_SESSION['errormsg'];
                unset($_SESSION['errormsg']);
                ?>
              </h2>
            <?php
            }
            ?>
          </div>
          <form action="adminlogincode.php" method="POST">
            <div class="form-group">
              <label for="email">Email Id</label>
              <input type="email" class="input-field" id="email" name="adminemail" placeholder="Enter Email Id" required>
            </div>

            <div class="form-group">
              <label for="pswd">Password</label>
              <input type="password" id="pswd" name="adminpassword" required>
            </div>

            <button type="submit" name="adminlogin" id="adminsignin" class="form-submit">LOGIN</button>
          </form>

        </div>
      </div>
    </div>




  </div>

  <!-- Admin sign in contains-->
  <div class="returnhome">
    <a href="index.php">Return Home</a>
  </div>

  </div>


  </div>





  <script>
    let btn = document.getElementById('btn');
    let voter = document.getElementById('votershow');
    let admin = document.getElementById('adminshow');
    let headtext = document.getElementById('form-title');

    function leftclick() {
      btn.style.left = '0';
      voter.style.display = 'block';
      admin.style.display = 'none';
      headtext.innerHTML = "Voter Login";
    }

    function rightclick() {
      btn.style.left = '50%';
      voter.style.display = 'none';
      admin.style.display = 'block';
      headtext.innerHTML = "Admin Login";
    }
  </script>



</body>

</html>