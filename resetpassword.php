<?php
session_start();
include 'database/connection.php';
?>

<?php

$cond = 0;
if (isset($_POST['frgtpwd'])) {
  $vid = $_POST['VoterId'];
  $mail = $_POST['Email'];
  $votersearch = " select * from voters where voterid='$vid' and email='$mail' ";
  $query = mysqli_query($con, $votersearch);
  $vcount = mysqli_num_rows($query);
  if($vcount) {
    $cond = 1;
    $result = mysqli_fetch_assoc($query);
    $dbpassword = $result['password'];
  }
  else{
    $cond = 0;
   ?>
   <script>
     alert("Please Enter Correct Voter Id and Email");
     </script>
     <?php
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="resetpwd.css">
  <link rel="stylesheet" href="admin/css/input.css">
  <style>
    .input-field input{
width:70%;
    }
    </style>

</head>

<body>
  <div class="page">
 <div class="container">
    <div class="forgot-form">
      <h1>Forgot Password</h1>
      <p>Please enter your Voter Id and Email Id below to Know your Login password</p>
      <?php
      if($cond == 1)
      {
        ?>
      
      <div class="input-panel-body chek" style=" display: <?php echo $cond == 1?'flex':'none'?>">
                                    <div class="inputtitle">
                                        <label for="pswd">Your Password
                                            
                                        </label>
                                    </div>
                                    <div class="input-field">
                                    <input type="text" value="<?php echo $dbpassword ?>" disabled/>
                                    </div>
                                </div>
      <div>
        <?php
        }
        ?>
      <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
     
      <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="VoterId">Voterid
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                    <input type="text" name="VoterId" id="VoterId" placeholder="Enter Voter Id" required/>
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="email">Email
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                    <input type="email" name="Email" id="email" placeholder="Enter Your Email Id" required/>
                                    </div>
                                </div>
      <button id="mybtn" class="form-submit" name="frgtpwd" role="Submit">Reset</button>
     
     </form>
    <style>
      .chek{
        display:none;
      }
      .bcl{
        text-decoration:none;
        font-size: 1.7rem;
        color:#3db2ff;
        padding:1.3rem 0;
      }
      </style>
     
        <a class="bcl" href="login.php">Return Back</a>
    </div>
                               
    </div>
 </div>
 </div>
 
</body>
</html>