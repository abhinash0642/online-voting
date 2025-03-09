<?php
include 'masterfile/header.php';
include 'masterfile/sidebar.php';
titlename("Candidate List");
?>

<h1 class="pagetitle"> Candidate List</h1>
<a href="candidatemodal.php" id="myBtn" target="_self">Add New Candidate</a>
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

    <?php
    $sql = " SELECT * FROM elections where status='active' Order By electionid DESC LIMIT 1 ";
    $query = mysqli_query($con, $sql);
    $electionstateval;
    $tablename;
    $year;
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $year = date("Y", strtotime($row['pollingdate']));
        $tablename = 'assembly';
        if ($row['electiontype'] == 'National') {
            $tablename = 'assembly' . $year;
        } else {
            $tablename = $row['electionstate'] . $year;
        }
        $pr = $tablename;
        $electionstateval = $row["electionstate"];
    } else {
        $tablename = 'demotable';
    }
    ?>

    <!-- Showing the candidates of selecteed election state   -->
    <?php
    $electionstateval;
    if (!isset($_POST['showcand'])) {
        $tablename = $pr;
    } else {
        extract($_POST);

        if ($selectelection == '-1') {
    ?>
            <script>
                alert("PLease Select  the Election to view the Candidates");
            </script>

    <?php
        } else {
            $sql = " SELECT * FROM `elections` WHERE electionid = '$selectelection' ";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($query);
            extract($row);
            $year = date("Y", strtotime($pollingdate));
            $tablename = 'assembly';

            if ($electiontype == 'National') {
                $tablename = 'assembly' . $year;
            } else {
                $tablename = $electionstate . $year;
            }
            $electionstateval = $electionstate;
        }
    }
    ?>



    <!-- Candidate List  Table -->

    <!-- Active Elections Dropdown -->
    <?php
    $sql = " SELECT * FROM elections where status='active'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) < 0) {
    ?>
        <div>NO ELECTION IS ON GOING</div>
    <?php
    } else {
    ?>

        <div class="tablecontainer">
            <h1 style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Candidates Table</h1>

            <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="form-item">
                    <label for="selectelection">Election Name</label>
                    <select name="selectelection" id="selectelection">
                        <option value="-1">Select Election</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <option value="<?php echo $row['electionid'] ?>" <?php echo ($row['electionstate'] == $electionstateval ? 'selected' : '') ?>><?php echo $row['electionname'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                    <button type="submit" name="showcand" value="show">Show</button>
                </div>

            </form>
            <div class="tablebox">

                <table id="mytable">
                    <thead>
                        <tr>
                            
                            <th>Image</th>
                            <th>Name</th>
                            <th>Party Name</th>
                            <th>Contesting For</th>
                            <th>Constituency</th>
                            <th colspan='3'>Action</th>
                        </tr>
                    </thead>
                    <tbody id="candidatelist">



                        <?php
                        $command = " SELECT * FROM  `$tablename` ";
                        $query_run = mysqli_query($con, $command);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    
                                    <td><?php echo '<img src="../uploads/candidateavatar/' . $row['avatar'] . '" width="100px" height="100px" alt="Voter Avatar"/>' ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['partyname'] ?></td>
                                    <td><?php echo $row['contestingfor'] ?></td>
                                    <td><?php echo $row['constituency'] ?></td>
                                    <td>
                                        <form action="viewcandidate.php" method="POST">
                                            <input type="hidden" name="tablename" value="<?php echo $tablename ?>">
                                            <input type="hidden" name="candidateid" value="<?php echo $row['candidateid'] ?>">
                                            <button class="crudbtn viewbtn" name="viewbtn">View</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="editcandidate.php" method="POST">
                                            <input type="hidden" name="tablename" value="<?php echo $tablename ?>">
                                            <input type="hidden" name="candidateid" value="<?php echo $row['candidateid'] ?>">
                                            <button class="crudbtn editbtn" name="updatebtn">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="CandidateUDC.php" method="POST">
                                            <input type="hidden" name="tablename" value="<?php echo $tablename ?>">
                                            <input type="hidden" name="candidateid" value="<?php echo $row['candidateid'] ?>">
                                            <button class="crudbtn delbtn" name="delbtn">Delete</button>
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
                    }
                    ?>
                    </tbody>

                </table>
            </div>
        </div>
        <?php
        ?>

        <?php
        include 'masterfile/footer.php'
        ?>