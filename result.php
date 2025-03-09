<?php
include 'header.php';
?>
<style>
    .headerwrapper {
        height: 100%;
    }
</style>
</div>


<?php
$sql = " SELECT * FROM result where status='Published' Order By id LIMIT 1 ";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $tablename = $row['electionname'];
    $estate = $tablename;
$p=$estate;
}
?>

<?php
if (!isset($_POST['showcand'])) {
    $tablename = $estate;
    $p=$tablename;
} else {
    extract($_POST);
    $tablename = $name;
    $p=$tablename;
}
?>



<?php
//Truncating the Temporary table
$sql = "TRUNCATE TABLE `tempdatastorage` ";
$sqlquery = mysqli_query($con, $sql);
if ($sqlquery) {
    //Creating table for candidate having max votes
    $command = " SELECT * 
                        FROM `$tablename`
                          INNER JOIN(
                              SELECT `constituency`, MAx(votes) votes 
                              FROM `$tablename` 
                              GROUP BY constituency
                            )maxvotes
                                  ON maxvotes.constituency = $tablename.constituency
                                    AND maxvotes.votes = $tablename.votes ";


    $query_run = mysqli_query($con, $command);
    if (mysqli_num_rows($query_run) > 0) {
        //inserting values into an array
        $pname = array();
        $constituency = array();
        $votes = array();
        $cname = array();
        while ($row = mysqli_fetch_assoc($query_run)) {
            $pname[] = $row['partyname'];
            $constituency[] = $row['constituency'];
            $votes[] = $row['votes'];
            $cname[] = $row['name'];
            $inspartyname = $row['partyname'];
            // Inserting into a temporary table just for generating chart
            $sql = "INSERT INTO `tempdatastorage` (`partyname`) VALUES ('$inspartyname')";
            $executesql = mysqli_query($con, $sql);
            if (!$executesql) {
                echo "Error:Insert";
            }
        }
    }
    else {
        $pname[] = 0;
        $constituency[] = 0;
        $votes[] = 0;
        $cname[] = 0;
    }
} else {
    echo "Error: Truncate";
}
?>
<style>
    .selectpanel{
        width:50%;
        margin:0 auto;
    }
    .resultwrapper{
        background:white;
        border-radius:.5rem;
        margin-top:1rem;
    }
    th{
        font-size:1.5rem;
    }
</style>
<div class="main-body">
    <div class="mainwrapper">
        <div class="result-panel">
            <div class="selectpanel">
                <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="form-grouping">
                        <div class="form-item">
                            <label for="selectelection">Election Name</label>
                            <select name="name" id="selectelection">
                               
                                <?php
                                $sql = " SELECT * FROM `result` where status='Published'";
                                $query = mysqli_query($con, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    //<?php echo ($row['name'] == $estate ? 'selected' : '')
                                    while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                        <option value="<?php echo $row['electionname']  ?>" <?php echo ($row['electionname']== $p ? 'selected' : '') ?> ><?php echo $row['electionname'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                        <button class="showbtn" type="submit" name="showcand" value="show">Show</button>
                        </div>
                    </div>
                   
                </form>
            </div>
            <!-- Selectpanel Ended -->
            <div class="result-wrapper">
                <div class="tablewrapper">
                    <div class="statstbl">
                        <div class="tablebox">
                            <table id="mytable">
                                <thead>
                                    <tr>
                                        <th>Registered Voters</th>
                                        <th>Voted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>50000</td>
                                            <?php
                                            $sql = " SELECT  totalvotes FROM result where electionname = '$tablename' ";
                                            $res = mysqli_query($con, $sql);
                                            $row =mysqli_fetch_assoc($res);
                                            ?>
                                            <td><?php echo $row['totalvotes'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="partyperctgtbl">
                        <div class="tablebox">
                            <table id="mytable">
                                <thead>
                                    <tr>
                                        <th>Party Name</th>
                                        <th>Vote Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = " SELECT SUM(votes) totalvote FROM `$tablename` ";
                                    $result = mysqli_query($con, $sql);
                                    $totalvotes = mysqli_fetch_assoc($result);
                                    $sqlcmd = " SELECT `partyname`, (SUM(votes)/52324)*100 as votepercentage FROM `$tablename` GROUP BY `partyname` ";
                                    $executequery = mysqli_query($con, $sqlcmd);
                                    if (mysqli_num_rows($executequery) > 0) {
                                        while ($row = mysqli_fetch_assoc($executequery)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['partyname'] ?></td>
                                                <td><?php echo $row['votepercentage'] ?></td>
                                            </tr>
                                    <?php

                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="seats-charts">
                    <div class="partydoughnutchart">
                        <?php
                        $sql = "SELECT COUNT(partyname) as total from `tempdatastorage`";
                        $query = $query =  mysqli_query($con, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            $row = mysqli_fetch_assoc($query);
                            $totalseats = $row['total'];
                            $majority = (int)(($totalseats / 2) + 1);
                        ?>
                            <div class="result-seats-info"> <?php echo $totalseats ?> Seats <?php echo $majority ?> For Majority</div>
                        <?php
                        }
                        ?>
                        <?php
                        include 'admin/chart.php';
                        ?>


                    </div>

                    <div class="partyseatstable">
                        <?php
                        $len = count($partynames);
                        extract($partynames);
                        extract($seatcount);

                        ?>
                        <div class="tablebox">
                            <table id="mytable">
                                <thead>
                                    <tr>
                                        <th>Parties</th>
                                        <th>Seats won</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $len; $i++) {
                                    ?>
                                        <tr>

                                            <td><?php echo $partynames[$i] ?></td>
                                            <td><?php echo $seatcount[$i] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th><?php echo $totalseats ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tablebox">
                <table id="mytable">
                    <caption style="font-size: 2rem;font-weight: 500; margin-bottom:10px">Candidates Who Won Election</caption>
                    <thead>
                        <tr>
                            <th>Constituency</th>
                            <th>Candidate Name</th>
                            <th>party Name</th>
                            <th>votes</th>
                            

                        </tr>
                    </thead>
                    <tbody id="candidatelist">

                        <?php
                        extract($pname);
                        extract($cname);
                        extract($constituency);
                        extract($votes);

                        $len = count($votes);
                        for ($i = 0; $i < $len; $i++) {
                        ?>

                            <tr>
                                <td><?php echo $constituency[$i] ?></td>
                                <td><?php echo $pname[$i] ?></td>
                                <td><?php echo $cname[$i] ?></td>
                                <td><?php echo $votes[$i] ?></td>
                                
                            </tr>



                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <!-- Table Box Ended -->
        </div>
    </div>

</div>
<?php
include 'footer.php';
?>



<div>



</div>