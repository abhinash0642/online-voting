<?php
include 'voterheader.php';
?>
<?php

$vid = $_SESSION['voteruid'];
$sql = " SELECT * FROM voters WHERE voterid = '$vid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
//changing array into variables
extract($row);
?>

<style>
  .votesection {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
    background-color: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    border: 1px solid transparent;
    border-radius: 12px;

  }

  .votebody {
    margin: 3rem 0;
    width: 40%;
    background-color: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    border: 1px solid transparent;
    border-radius: 6px;

  }

  .votecard {
    width: 100%;
    background-color: white;
    border-radius: 2rem;
    color: crimson;
    margin-bottom: 1.2rem;
    padding: 1rem 0;
  }

  .partyrow {
    width: 100%;
    padding: 0 1rem 1rem 1rem;
    border-bottom: 1px solid whitesmoke;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .partylogo {
    width: 2.3rem;
    height: 2.3rem;
    border-radius: 50%;
    margin-right: 1.2rem;
  }

  .partyname {
    font-size: 2rem;
    font-weight: 500;
    letter-spacing: .2rem;
  }

  .cnddetail {
    width: 100%;
    padding: .5rem 3rem;
  }

  .cndbody {
    width: 100%;
    color: var(--dark);
    text-align: center;
  }

  .cndavatar {
    display: block;
    width: 6rem;
    height: 6rem;
    border-radius: 50%;
    margin: 1rem auto;
  }

  .cndname {


    margin-bottom: 1rem;
    font-size: 2rem;
    font-weight: 600;
    letter-spacing: .2rem;
  }

  .cndbody h2 {
    margin-bottom: .6rem;

  }

  .cndbody h2 span {
    color: crimson;
  }

  .cndbody a {
    color: #1D7DE8;
    font-size: 1.2rem;
    font-weight: 500;
    cursor: pointer;
  }

  .votebtn {
    display: block;
    width: 40%;
    box-sizing: border-box;
    padding: .6rem 1rem;
    border-radius: 1.5rem;
    background: #1D7DE8;
    font-size: 1.5rem;
    font-weight: 500;
    text-align: center;
    margin:0 auto;
    border:none;
    box-shadow:0 2px 3px slategray;

  }

  .votebtn:disabled {
    background-color: #e2e2e2;
    cursor:not-allowed;
    border:none;
    color:black;
    width:50%;
    margin:0rem auto;
    margin-bottom:.7rem;

  }

  .section {
    width: 100%;
    margin-top: 3rem;
    padding: 0 12rem;
  }

  .section>h1 {
    width: 100%;
    padding-bottom: .6rem;
    font-size: 2.7rem;
    font-weight: 500;
    border-bottom: 2px solid crimson;
    margin: 0 auto;

  }

  .polldates {
    width: 100%;
    padding: 2rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;

  }

  .dates {
    width: fit-content;
    padding: 1rem 2rem;
    border-radius: 3rem;
   
    font-size: 1.4rem;
    color: var(--dark);
    background-color: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    border: 1px solid transparent;
    

  }
</style>


<?php
if (isset($_POST['polling'])) {
  $electionname = $_POST['elecname'];
  $vid = $_SESSION['voteruid'];




  //Selecting the voters soo that we can know their constituency and show them the candidates from the table contestinng from same constituency
  $command = " SELECT * FROM `voters` WHERE voterid='$vid' ";
  $query_run = mysqli_query($con, $command);
  $value = mysqli_fetch_assoc($query_run);
  $constituency = $value['constituency'];

  $sql = " SELECT * FROM `elections` WHERE electionname = '$electionname' ";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($query);
  extract($row);
  $tablename = 'assembly';
  $year = date("Y", strtotime($pollingdate));
  $elecname = $electionname;
  if ($electiontype == 'National') {
    $tablename = $tablename . $year;
  } else {
    $tablename = $electionstate . $year;
  }
  $command = " SELECT * FROM `$tablename` WHERE constituency='$constituency' ";
  $query_run = mysqli_query($con, $command);
?>


<style>
  .iuy{
    width:100%;
    padding:2rem 10rem;

  }
  .iuy > h1{
color: #3db2ff;
font-size:2.7rem;

  }
  .pgt{
    color:red;
    text-decoration:bold;
  }
  .cnddetail{
    color:black;
  }
</style>

<div class="iuy">
  <h1><?php echo $electionname ?></h1>

  <div class="polldates">

    <div class="dates"> Polling Date: <?php echo $pollingdate ?></div>
    <div class="dates pgt"> End Date: <?php echo date('Y-m-d', strtotime($pollingdate. ' +1 days')) ?> </div>
  </div>

  <div class="votesection">



    <?php
    if (mysqli_num_rows($query_run) > 0) {
      while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
        <div class="votebody">
          <div class="votecard">
            <div class="partyrow">
              <?php echo '<img class="partylogo" src="../uploads/candidateavatar/' . $row['avatar'] . '"  alt="Voter Avatar"/>' ?>
              <h2 class="partyname"><?php echo $row['partyname'] ?></h2>
            </div>
            <div class="cnddetail">
              <div class="cndbody">
                <img class="cndavatar" src="../images/avt1.jpg" alt="candidate avatar">
                <h1 class="cndname"><?php echo $row['name'] ?></h1>
                <h2>Date of Birth: <span><?php echo $row['dob'] ?></span></h2>
               
              </div>
            </div>
          </div>
          <form action="votingpage.php" method="POST">
            <input type="hidden" name="tablename" value="<?php echo $tablename ?>">
            <input type="hidden" name="cndid" value="<?php echo $row['candidateid'] ?>">
            <?php
            if ($electiontype == 'National') {
            ?>
              <button class="votebtn" name="votebtn" <?php echo $LSvotestatus == 'Voted' ? 'disabled' : '' ?>>Vote</button>
            <?php
            } else {
            ?>
              <button class="votebtn" name="votebtn" <?php echo $Statevotestatus == 'Voted' ? 'disabled' : '' ?>>Vote</button>
            <?php
            }
            ?>

          </form>
        </div>


  <?php
      }
    } else {
      echo "NO Candidates has filed Nomination";
    }
  }
  ?>

  </div>

  </div>

  </div>

  <?php
  include 'voterfooter.php';
  ?>