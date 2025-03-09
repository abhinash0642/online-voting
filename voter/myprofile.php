<?php
include 'voterheader.php';

?>
<style>
.section {
    padding: 0 25rem;
}

.myprofile {
    width: 100%;

    padding: 0 5rem;
}

.myprofile h1 {
    text-align: center;
}

.voteravatar {
    width: 12rem;
    display: block;
    margin: 0 auto;
}

.myprofile h2 {
    width: 100%;
    margin-bottom: 1rem;

}

h2 span {
    display: inline-block;
    padding: 1rem 4rem;
    border: 2px solid crimson;
    background-color: var(--white);
    color: var(--dark);
    font-size: 1.4rem;
    letter-spacing: .2rem;
    margin-left: 2rem;
    border-radius: 2rem;
}

button {
    padding: 1rem 2rem;
    border-radius: 1rem;
}
</style>
<div class="page-heading">
  <h1>My Profile</h1>
</div>
<div class="input-section">
    
    <?php
  $vid = $_SESSION['voteruid'];
  $command = " SELECT * FROM `voters` WHERE voterid='$vid' ";
  $query_run = mysqli_query($con, $command);
  foreach ($query_run as $row) {
    $address = $row['houseno'] . ", " . $row['street'] . ", " . $row['district'] . ", " . $row['state'] . ", India, " . $row['pincode'];
  ?>

  
        
                <?php
        echo '<img src="../uploads/voterimg/' . $row['voterpic'] . '" width="150px" height="150px" alt="Voter Avatar"/>'
        ?>
           
        
    
    <style>
    .group {

        width: 100%;
        display: flex;
        align-items: center;
        text-align: center;

    }

    .voterdetail {
        border: 1px solid white;
        width: 100%;
        margin-top: 2rem;
        margin-bottom: 1rem;

    }

    .head {
        font-size: 1.5rem;
        font-weight: 300;
        letter-spacing: .1rem;
        color: sandybrown;
        border-right: 1px solid white;
    }

    .value {
        background-color: whitesmoke;
        color: var(--dark);
        font-size: 1.2rem;
        font-weight: 300;
        letter-spacing: .1rem;

    }

    .head,
    .value {
        width: 50%;
        padding: 1rem 2rem;
    }
    </style>
    <div class="input-panel">
        <div class="input-panel-heading">
            <h2>Enter Your Personal Details</h2>
        </div>
        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title"> Voter Id</div>
            </div>
            <div class="input-field">
                <div class="inputvalue">
                    <?php echo $vid ?>
                </div>
            </div>
        </div>


        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Name</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['votername'] ?> </div>
            </div>
        </div>
        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Date of Birth</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['dateofbirth'] ?></div>
            </div>
        </div>

        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Gender</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['gender'] ?></div>
            </div>
        </div>

        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Father Name</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['fathername'] ?></div>
            </div>
        </div>

        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Email Id</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['email'] ?></div>
            </div>
        </div>
        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Phone NO</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['phoneno'] ?></div>
            </div>
        </div>

        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Address</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $address ?></div>
            </div>
        </div>

        <div class="input-panel-body">
            <div class="inputtitle">
                <div class="title">Constituency</div>
            </div>
            <div class="input-field">
                <div class="inputvalue"><?php echo $row['constituency'] ?></div>
            </div>
        </div>
    </div>
<div class="input-panel-body">
<button id="cngpwd" class="submitbtn"> Change Password </button>
  </div>


<style>
  .title{
    font-size:1.9rem;
  }
  .inputvalue{
    font-size:1.8rem;
  }

#cngpwd {
    text-align: center;
    display: block;
    margin: 0 auto;
    
}
.cv{
  display:flex;
}
.cv #cancelbtn{
  all:unset;
background:crimson;
padding:.7rem 1.5rem;
}
#pwdbody {
    display: none;
}
</style>
<div id="pwdbody" class="input-panel">
    <div class="input-panel-heading">
      <div class="cv">
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
            <input type="text" name="oldpassword" class="inputbtn" id="oldpassword" placeholder="Old Password" required />
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
            <input type="text" name="cnfrmpassword" class="inputbtn" id="cnfrmpassword"
                placeholder="Confirm Password" required/>
        </div>
    </div>
    <div class="input-panel-body">
        <button name="changepwd" class="submitbtn">Change Password</button>
        
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

<?php
  }
?>
</div>