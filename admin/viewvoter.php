<?php
require '../database/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VOTER VIEW</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css/input.css">
  <!-- Main css -->
  <style>
    .imgpreview {
      display: block;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin: 0 auto;

    }

    #image {
      display: block;
      width: 80%;
      position: relative;
      width: 80%;
      background-color: #29B5FF;
      color: white;
      text-align: center;
      padding: 0.5rem 0.5rem;
      font-family: sans-serif;
      border-radius: 0.3rem;
      cursor: pointer;
      margin: 0 auto;
      margin-top: 2rem;

    }
  </style>
</head>

<body>
  <div class="main-container">
    <a href="voters.php">Back</a>
    <div class="input-section">

      <?php


      if (isset($_POST['viewbtn'])) {
        $id = $_POST['voterid'];

        $command = " SELECT * FROM voters WHERE voterid='$id' ";
        $query_run = mysqli_query($con, $command);

        foreach ($query_run as $row) {

      ?>

          <div class="input-panel-body">
            <div class="inputtitle">
              <?php echo '<img src="../uploads/voterimg/' . $row['voterpic'] . '" class="imgpreview" alt="Voter Avatar"/>' ?>
            </div>
          </div>

          <div class="input-panel-body">
            <div class="inputtitle">
              <label for="voterid">Voter Id</label>
            </div>
            <div class="input-field">
              <input type="text" name="voterid" class="inputbtn" id="name" value="<?php echo $row['voterid'] ?>" disabled />
            </div>
          </div>
    <div class="input-panel">
      <div class="input-panel-heading">
        <h2>Personal Details</h2>
      </div>
      <div class="input-panel-body">
        <div class="inputtitle">
          <label for="name">Name</label>
        </div>
        <div class="input-field">
          <input type="text" name="name" class="inputbtn" id="name" value="<?php echo $row['votername'] ?>" disabled />
        </div>
      </div>

      <div class="input-panel-body">
        <div class="inputtitle">
          <label for="dob">Date of Birth</label>
        </div>
        <div class="input-field">
          <input type="text" name="dob" class="inputbtn" id="dob" value="<?php echo $row['dateofbirth'] ?>" disabled />
        </div>
</div>
        <div class="input-panel-body">
          <div class="inputtitle">
          <label for="gender">Gender</label>
          </div>
          <div class="input-field">
          <input type="text" name="gender" class="inputbtn" id="gender" value="<?php echo $row['gender'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="email">Email Id</label>
          </div>
          <div class="input-field">
            <input type="email" name="email" class="inputbtn" id="email" value="<?php echo $row['email'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="phone">Mobile Number</label>
          </div>
          <div class="input-field">
            <input type="text" name="phone" class="inputbtn" id="phone" value="<?php echo $row['phoneno'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="fthname">Father's Name</label>
          </div>
          <div class="input-field">
            <input type="text" name="fthname" class="inputbtn" id="fthname" value="<?php echo $row['fathername'] ?>" disabled />
          </div>
        </div>
      </div>
        
      <div class="input-panel">
        <div class="input-panel-heading">
          <h2>Postal Address</h2>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="place1">Address 1</label>
          </div>
          <div class="input-field">
            <input type="text" name="add1" class="inputbtn" id="place1" value="<?php echo $row['houseno'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="place2">Address 2</label>
          </div>
          <div class="input-field">
            <input type="text" name="add2" class="inputbtn" id="place1" value="<?php echo $row['street'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="state">State</label>
          </div>
          <div class="input-field">
            <input type="text" name="state" class="inputbtn" id="state" value="<?php echo $row['state'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="district">District</label>
          </div>
          <div class="input-field">
            <input type="text" name="district" class="inputbtn" id="district" value="<?php echo $row['district'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="pin">PIN CODE</label>
          </div>
          <div class="input-field">
            <input type="text" name="pin" class="inputbtn" id="pin" value="<?php echo $row['pincode'] ?>" disabled />
          </div>
        </div>
        <div class="input-panel-body">
          <div class="inputtitle">
            <label for="constituency">constituency</label>
          </div>
          <div class="input-field">
            <input type="text" name="constituency" class="inputbtn" id="constituency" value="<?php echo $row['constituency'] ?>" disabled />
          </div>
        </div>
      </div>

    <?php
        }
      }
    ?>
      </div>
      
    </div>
    </div>
</body>

</html>