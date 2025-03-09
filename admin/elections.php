<?php
include 'masterfile/header.php';
include 'masterfile/sidebar.php';
titlename("Election List");

?>
<h1 class="pagetitle"> Election List</h1>
<a href="electionmodal.php" id="myBtn" target="_self">Add an Upcoming Election</a>
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













<!-- =============================================================================================
                                    TABLE: ALL AVAILABLE VOTER LIST
      =============================================================================================  -->

<?php
$command = " SELECT * FROM elections ";
$query_run = mysqli_query($con, $command);
?>

<div class="tablecontainer">
    <h1 style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Election Table</h1>
    <div class="tablebox">

        <table id="mytable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Polling Date</th>
                    <th>Type</th>
                    <th>State</th>
                    <th>Description</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['electionid'] ?></td>
                            <td><?php echo $row['electionname'] ?></td>
                            <td><?php echo $row['pollingdate'] ?></td>
                            <td><?php echo $row['electiontype'] ?></td>
                            <td><?php echo $row['electionstate'] ?></td>
                           
                            <td>
                                <form action="editelection.php" method="POST">
                                    <input type="hidden" name="electionid" value="<?php echo $row['electionid'] ?>">
                                    <button class="crudbtn editbtn" name="updatebtn">Update</button>
                                </form>
                            </td>
                            <td>
                                <form action="electionUDC.php" method="POST">
                                    <input type="hidden" name="electionid" value="<?php echo $row['electionid'] ?>">
                                    <button class="crudbtn delbtn" name="deletebtn">Delete</button>
                                </form>
                            </td>
                        </tr>

                    <?php

                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">No Record Available</td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</div>



<?php
include 'masterfile/footer.php';
?>