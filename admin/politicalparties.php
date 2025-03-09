<?php
    include 'masterfile/header.php';
    include 'masterfile/sidebar.php';
    titlename("Political Parties");
    
?>

<h1 class="pagetitle">Political Parties</h1>
<a id="myBtn" href="partymodal.php" target="_self">Add New Party</a>
</div>
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
if (isset($_SESSION['successmsg']) && $_SESSION != '') {
    ?>
        <h2 class="status successstatus">
            <?php
            echo $_SESSION['successmsg'];
            unset($_SESSION['successmsg']);
            ?>
        </h2>
    <?php
    }
    ?>

</div>


<!-- Voter's List  Table -->
<?php
$command = " SELECT * FROM politicalparty ";
$query_run = mysqli_query($con, $command);
?>
<div class="tablecontainer">
  <div class="tablebox">
    <table id="mytable">
      <caption style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Political Parties Table</caption>
      <thead>
        <tr>
          <th>Unique ID</th>
          <th>Symbol</th>
          <th>Name</th>
          <th>Type</th>
          <th>State Name</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <tr>
              <td><?php echo $row['partycode'] ?></td>
              <td><?php echo '<img src="../uploads/partysymbols/' . $row['symbol'] . '" width="100px" height="100px" alt="Party Symbol"/>' ?></td>
              <td><?php echo $row['partyname'] ?></td>
              <td><?php echo $row['partytype'] ?></td>
              <td><?php echo $row['statename'] ?></td>
              <td>
                <form action="editparty.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['partycode'] ?>">
                  <button class="crudbtn editbtn" name="updatebtn">Update</button>
                </form>
              </td>
              <td>
                <form action="partyUDC.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['partycode'] ?>">
                  <button class="crudbtn delbtn" name="rmvbtn">Delete</button>
                </form>
              </td>
            </tr>


          <?php

          }
        } else {
          ?>
          <tr>
            <td colspan="5">No Record Available</td>
          </tr>
        <?php
        }

        ?>
      </tbody>
      <tfoot>
       <tr>
          <th>Unique ID</th>
          <th>Symbol</th>
          <th>Name</th>
          <th>Type</th>
          <th>State Name</th>
          <th colspan='2'>Action</th>
        </tr> 
      </tfoot>
    </table>
  </div>
</div>

<?php
include 'masterfile/footer.php'
?>