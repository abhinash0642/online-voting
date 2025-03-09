<?php
    include 'masterfile/header.php';
    titlename("Voter Approval");
    include 'masterfile/sidebar.php';
?>


<h1 class="pagetitle"> VoterApproval list</h1>
<?php
$sql = " SELECT * FROM applicants";
        $result = mysqli_query($con,$sql);
        if($result){
          $rowcount = mysqli_num_rows( $result );
          ?>
<div>Approval Pending :<?php echo $rowcount ?></div>
<?php
        }
        ?>

</div>


<!-- Voter's List  Table -->
<div class="tablecard">


    <?php
    $command = " SELECT * FROM applicants ";
    $query_run = mysqli_query($con, $command);
    ?>
    <div class="tablecontainer">
        <div class="tablebox">
            <table id="mytable">
                <caption style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Applicants Table</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Voter Image</th>
                        <th>Voter Name</th>
                        <th>Constituency</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                           
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo '<img src="../uploads/voterimg/' . $row['voterpic'] . '" width="100px" height="100px" alt="Voter Avatar"/>' ?>
                        </td>
                        <td><?php echo $row['votername'] ?></td>
                        <td><?php echo $row['constituency'] ?></td>
                        <td>
                            <form action="viewapplicant.php" method="POST">
                                <input type="hidden" name="userid" value="<?php echo $row['id'] ?>">
                                <button class="crudbtn viewbtn" name="viewbtn">View</button>
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
            </table>
        </div>
    </div>
</div>


<?php
include 'masterfile/footer.php';

?>