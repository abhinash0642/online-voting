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
    .imgpreviews {
      display: block;
      width: 150px;
      height: 150px;
     box-shadow:0 2px 3px grey;
      

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
    <div class="page-heading">
      <h1>Voter Approval</h1>
    </div>
    <div class="signup-form">



      <?php
      if (isset($_POST['viewbtn'])) {
        $id = $_POST['userid'];

        $command = " SELECT * FROM applicants WHERE id='$id' ";
        $query_run = mysqli_query($con, $command);

        foreach ($query_run as $row) {

      ?>

          <div class="input-section">

            <div class="input-panel-body">
              <div class="input-field">
                <?php echo '<img src="../uploads/voterimg/' . $row['voterpic'] . '" class="imgpreviews" alt="Voter Avatar"/>' ?>
              </div>
            </div>


            <div class="input-panel">
              <div class="input-panel-heading">
                <h2>Enter Your Personal Details</h2>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="votername">Name

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="votername" id="votername" value="<?php echo $row['votername'] ?> " disabled />
                </div>
              </div>

              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="fathername">Father Name

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="fathername" id="fathername" value="<?php echo $row['fathername'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="gender">Gender

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="gender" id="gender" value="<?php echo $row['gender'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="dob">Date of Birth

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="dob" id="dob" value="<?php echo $row['dob'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="email">Email Id

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="email" id="email" value="<?php echo $row['email'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="mobile">Phone No

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="mobile" id="mobile" value="<?php echo $row['phoneno'] ?> " disabled />
                </div>
              </div>

            </div>

            <div class="input-panel">
              <div class="input-panel-heading">
                <h2>Date of Birth Document</h2>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="dobdoctype">Type of Document

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="dobdoctype" id="dobdoctype" value="<?php echo $row['dobprooftype'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="dobproof">Date of Birth Proof

                  </label>
                </div>
                <div class="input-field">
                  <?php echo '<img src="../uploads/dobproofs/' . $row['dobproof'] . '" class="imgpresq" alt="Voter Avatar"/>' ?>
                </div>
              </div>
            </div>





            <div class="input-panel">
              <div class="input-panel-heading">
                <h2>Postal Address</h2>
              </div>

              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="house">House No

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="house" id="house" value="<?php echo $row['houseno'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="street">Street/Area/Locality

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="street" id="street" value="<?php echo $row['street'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="state">State

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="state" id="state" value="<?php echo $row['state'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="district">District

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="district" id="district" value="<?php echo $row['district'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="constituency">Constituency

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="constituency" id="constituency" value="<?php echo $row['constituency'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="pin">Pin Code

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="pin" id="pin" value="<?php echo $row['pin'] ?> " disabled />
                </div>
              </div>
              
            </div>
            <div class="input-panel">
              <div class="input-panel-heading">
                <h2>Addrees Document</h2>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="adddoctype">Type of Document

                  </label>
                </div>
                <div class="input-field">
                  <input type="text" name="adddoctype" id="adddoctype" value="<?php echo $row['addressprooftype'] ?> " disabled />
                </div>
              </div>
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="addproof">Address Proof

                  </label>
                </div>
                <div class="input-field">
                  <?php echo '<img src="../uploads/addressproofs/' . $row['addproof'] . '" class="imgpresq" alt="Voter Avatar"/>' ?>
                </div>
              </div>
            </div>

<style>
  .imgpresq{
    width:29rem;
    height:15rem;
  }
  .mybtns{
    display:flex;
  }
  .mybtns button{
    padding:.6rem 1.5rem;
    background: #3db2ff;
    margin-right:1rem;
  }
</style>
<div class="input-panel-body">
      <div class="mybtns">
        <div class="approvebtn">
          <form action="approveapplicant.php" method="POST">
            <input type="hidden" name="approvalvoterid" value="<?php echo $row['id'] ?>">
            <button class="crudbtn approvebtn" name="approve">Approve</button>
          </form>
        </div>
        <div class="rejectmodalbtn">
          <button id="rejectbtn">Reject</button>
        </div>
      </div>
    </div>
          </div>
          
    </div>


    
    <style>
      #rejectmodal {
        width: 100%;
        height:100vh;
        padding: 6rem 15rem;
        position: fixed;
        top:0rem;
        z-index: 2;
        background:white;
        display: none;
      }
      .hg{
        display:flex;
      }
      #cancelbtn{
        all:unset;
        background:crimson;
        padding:.7rem 1.5rem;
        border-radius:.4rem;
      }
    </style>
    <div id="rejectmodal">
      <div class="page-heading">
        <h1>Reject Voter </h1>
      </div>
      <div class="input-panel">
        <div class="input-panel-heading">
        <div class="hg">
          <h2>Rejection Message</h2>
          
            <button id="cancelbtn">Cancel</button>
          </div>
        </div>


        <div class="input-panel-body" style="clear:both;">
          <div class="inputtitle">
            <label for="rejectmsg">Rejection reason</label>
          
          </div>
          <form action="rejectapplicant.php" method="POST" >
            <input type="hidden" name="approvalvoterid" value="<?php echo $row['id'] ?>">
            <div class="input-field">
              <textarea name="rejectmsg" id="rejectmsg" cols="30" rows="10" required>Reject Message</textarea>
            </div>
        </div>
        <div class="input-panel-body">

          <div class="mybtns">

            <button class="crudbtn delbtn" name="rejectbtn">Reject Voter</button>
           
          </div>

          </form>

        </div>




      </div>
         
    </div>

<?php
        }
      }
?>
  </div>


  <script>
    let modal = document.getElementById("rejectmodal");
    let rjbtn = document.getElementById("rejectbtn");
    let cnbtn = document.getElementById("cancelbtn");

    rjbtn.onclick = function() {
      modal.style.display = "block";
      // .style.display = "none";
    }

    cnbtn.onclick = function() {
      // chng.style.display = "block";
      modal.style.display = "none";
    }
  </script>
</body>

</html>