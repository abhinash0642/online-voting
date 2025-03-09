<?php
include '../database/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Profile</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css/input.css">
  <style>
    .imgpreviews{
      box-shadow: 0 2px 3px grey;
    }
  </style>
</head>

<body>
  <div class="main-container">
  <div class="page-heading">
      <h1>My Profile</h1>
    </div>

    <div class="input-section">
      <?php
      $id = $_SESSION['adminuid'];
      $command = " SELECT * FROM `admin` WHERE id='$id' ";
      $query_run = mysqli_query($con, $command);
      foreach ($query_run as $row) {

      ?>

        <div class="form-group">
          <?php echo '<img src="../uploads/adminimg/' . $row['profilepic'] . '" class="imgpreviews" alt="Voter Avatar"/>' ?>
        </div>
        <div class="input-panel-body">
            <div class="inputtitle">
          <label for="uid">Unique Id</label>
          </div>
            <div class="input-field">
          <input type="text" name="name" id="uid" value="<?php echo $id ?>" disabled />
        </div>
    </div>

        <div class="input-panel">
          <div class="input-panel-heading">
            <h2>Enter Your Personal Details</h2>
          </div>
          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="name">Name</label>
            </div>
            <div class="input-field">
              <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" disabled />
            </div>
          </div>

          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="dob">Date of Birth</label>
            </div>
            <div class="input-field">
              <input type="date" name="dob" id="dob" value="<?php echo $row['dob'] ?>" disabled />
            </div>
          </div>
          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="gender">Gender</label>
            </div>
            <div class="input-field">
              <input type="text" name="gender" id="gender" value="<?php echo $row['gender'] ?>" disabled />
            </div>
          </div>
          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="email">Email Id</label>
            </div>
            <div class="input-field">
              <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" disabled />
            </div>
          </div>
          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="phone">Mobile Number</label>
            </div>
            <div class="input-field">
              <input type="text" name="phone" id="phone" value="<?php echo $row['phone'] ?>" disabled />
            </div>
          </div>
        </div>
        <div class="input-panel-body">
        <button id="cngpwd" class="submitbtn"> Change Password </button>
      </div>
      <?php
      }

      ?>
      
<style>
   #pwdbody {
    display: none;
  }
  .pinkpink{
    display:flex;
  }
  #cancelbtn{
    
    all:unset;
    background:crimson;
    padding:.7rem 1.5rem;
    border-radius:.4rem;


  }
</style>

<div id="pwdbody" class="input-panel">

  <div class="input-panel-heading">
    <div class="pinkpink">
    <h2>Change Password</h2>
    <button id="cancelbtn">Cancel</button>
    </div>
    </div>
    <form action="changepassword.php" method="POST">
    <div class="input-panel-body">
      <div class="inputtitle">
        <label for="oldpassword">Old Password
          <span class="star">*</span>
        </label>
      </div>
      <div class="input-field">
        <input type="text" name="oldpassword" class="inputbtn" id="oldpassword" placeholder="Old Password" required/>
      </div>
    </div>
    <div class="input-panel-body">
      <div class="inputtitle">
        <label for="newpassword">New Password
          <span class="star">*</span>
        </label>
      </div>
      <div class="input-field">
        <input type="text" name="newpassword" class="inputbtn" id="newpassword" placeholder="New Password" required/>
      </div>
    </div>
    <div class="input-panel-body">
      <div class="inputtitle">
        <label for="cnfrmpassword">Confirm Password
          <span class="star">*</span>
        </label>
      </div>
      <div class="input-field">
        <input type="text" name="cnfrmpassword" class="inputbtn" id="cnfrmpassword" placeholder="Confirm Password" required/>
      </div>
    </div>
    <div class="input-panel-body">
       
        

          
        <button type="submit" name="changebtn" class="submitbtn">Change Password</button>
        
        
      
    </div>
    </form>
  </div>

  <script>
    let chng = document.getElementById("cngpwd");
    let pwdcard = document.getElementById("pwdbody");
    let cnbtn = document.getElementById("cancelbtn");

    chng.onclick = function() {
      pwdcard.style.display = "block";
      chng.style.display = "none";
    }

    cnbtn.onclick = function() {
      chng.style.display = "block";
      pwdcard.style.display = "none";
    }
  </script>

    </div>
  </div>
</body>

</html>