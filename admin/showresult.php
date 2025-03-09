<?php
include 'masterfile/header.php';
titlename("Results");
?>


<?php
if (isset($_POST['viewresultbtn'])) {
    extract($_POST);
    $tablename = 'assembly';
    $sql = " select * from elections where electionid = '$electionid' ";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        extract($row);
        $year = date("Y", strtotime($pollingdate));
        
        $elecname = $electionname;
        if ($electiontype == 'National') {
            $tablename = $tablename . $year;
        } else {
            $tablename = $electionstate . $year;
        }
       
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
        echo print_r($pname);
    } else {
        echo "Error: Truncate";
    }
    ?>




    <style>
        .mainwrapper {
            position: absolute;
            top: 7rem;
            left: 0;
            width: 100%;
            background-color: var(--bgclr);
        }

        .result-panel {
            position: relative;
            width: 100%;
            height: 100%;
            padding: 1.5rem 6rem 2rem 6rem;
        }

        .returnbtn {
            margin-bottom: 1.5rem;
            cursor: pointer;
            width: fit-content;
        }

        .returnbtn a {
            padding: .7rem 2rem;
            background: sandybrown;
            border-radius: 2rem;
        }
.pub button{
    padding: .7rem 2.6rem;
            background: sandybrown;
            border-radius: 2rem; 
            margin-bottom: 1.5rem;
            cursor: pointer;
            width: fit-content;  
}
        .returnbtn a:hover {
            opacity: 0.7;
        }

        .result-section {
            width: 100%;

        }

        .result-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1rem;
            border-radius: .6rem;
            background: var(--bgclr2);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            border: 1px solid transparent;
        }

        .result-head {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }

        .result-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 1.5rem 2rem;
        }

        /* .tablewrapper{
    
    height:100%;
    display: flex;
    flex-direction: column;
    align-content: space-around;
    
} */


        .statstbl,
        .partyperctgtbl,
        .partydoughnutchart,
        .partyseatstable {
            border-radius: .5rem;
            background: var(--clr);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            border: 1px solid transparent;
            margin-bottom: 4rem;
        }

        .partydoughnutchart {
            padding: 1rem;
        }

        .result-seats-info {
            background: skyblue;
            font-size: 1.7rem;
            font-weight: 500;
            color: var(--maintext);
            padding: .6rem 1rem;

        }

        .chartsection {
            width: 100%;
            padding: 1rem;
            margin-top: 1rem;
            background-color: var(--clr);
            border: 1px solid var(--maintext);
        }

        #myChart {
            color: black;
            width: 40rem;
            height: 20rem;
            font-size: 1rem;
            font-weight: 500;
        }
        .hshj{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
    </style>
    <div class="mainwrapper">
        <div class="result-panel">
            <div class="hshj">
            <div class="returnbtn">
                <a href="result.php">Return To Results</a>
            </div>

            <?php
            $md = "select * from result where electionname='$tablename'";
            $qry =  $result = mysqli_query($con, $md);
            $row = mysqli_fetch_assoc($qry);
            $st = $row['status'];
            
            if($st != "Published"){
                ?>
                <div class="pub">
                <form method="POST" action="code.php">
                    <input type="hidden" name="ecname" value="<?php echo $tablename ?>" />
                    <button name="pubbb" style="display: <?php echo ($bln == 1 ? 'hidden' : '') ?>">Publish Result</button>
                </form>
            </div>
            <?php
            }
        
            ?>
            
            </div>




            <div class="result-section">
                <div class="result-heading">
                    <div class="result-head">
                        <h2><?php echo $year . " " . $elecname . " Result" ?>
                        </h2>
                        <h5><?php echo "Updated " . date("d-m-Y") . " at 14:45" ?></h5>
                    </div>
                    <div>
                        <img class="countrymap" src="../images/india.png" width="" alt="Country Flag">
                    </div>
                </div>
                <style>
                    .countrymap {
                        width: 6rem;
                        height: 100%;
                        margin-right: 1rem;
                    }
                </style>

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
                            include 'chart.php';
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


        <?php
    }
        ?>
        </div>
    </div>



    </body>

    </html>