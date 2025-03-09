<?php
include 'masterfile/header.php';
include 'masterfile/sidebar.php';
titlename("Voter List");

?>

<h1 class="pagetitle"> Voterlist</h1>
<a href="votermodal.php" id="myBtn" target="_Self">
  Add New Voter
</a>
</div>
<!-- page name Ended -->



<!-- Voter's List  Table -->
<?php
$command = " SELECT * FROM voters ";
$query_run = mysqli_query($con, $command);
?>
<div class="tablecontainer">
<h1 style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Voter Table</h1>
      

  <!-- SELCT Options -->
  <div class="panel">
    <div class="select-option">
      <label for="maxrows">Select Number of Rows</label>
      <select name="maxrows" id="maxrows">

        <option value="10" selected>10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="250">250</option>
        <option value="5000">Show All</option>
      </select>
    </div>
  </div>
  <!-- SELCT Options Ended -->



  <!-- Table wrapper Started -->
  <div class="tablebox">
    <table id="mytable">
      <thead>
        <tr>
          <th>VoterID</th>
          <th>Voter Name</th>
          <th>Voter Image</th>
          <th>Email</th>
          <th>Constituency</th>
          <th colspan='3'>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <tr>
              <td class="uid"><?php echo $row['voterid'] ?></td>
              <td><?php echo $row['votername'] ?></td>
              <td><?php echo '<img class="voterimg" src="../uploads/voterimg/' . $row['voterpic'] . '"  alt="Voter Avatar"/>' ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['constituency'] ?></td>
              <td>
                <form action="viewvoter.php" method="POST">
                  <input type="hidden" name="voterid" value="<?php echo $row['voterid'] ?>">
                  <button class="crudbtn viewbtn" name="viewbtn">View</button>
                </form>
              </td>
              <td>
                <form action="editvoter.php" method="POST">
                  <input type="hidden" name="voterid" value="<?php echo $row['voterid'] ?>">
                  <button class="crudbtn editbtn" name="updatebtn">Update</button>
                </form>
              </td>
              <td>
                <form action="VoterUDC.php" method="POST">
                  <input type="hidden" name="voterid" value="<?php echo $row['voterid'] ?>">
                  <button class="crudbtn delbtn" name="delbtn">Delete</button>
                </form>
              </td>
            </tr>

          <?php

          }
        } else {
          ?>
          <tr>
            <td colspan="6">No Record Available</td>
          </tr>
        <?php
        }

        ?>








      </tbody>

    </table>
  </div>
  <!-- Table wrapper ENded -->
  <div class="pagination-container">
    <nav>
      <ul class="pagination"></ul>
    </nav>
  </div>
  <!-- pagination ended  -->
</div>
<!-- main tabble container ended  -->

<?php
include 'masterfile/footer.php'
?>