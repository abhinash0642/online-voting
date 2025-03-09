<?php
include 'voterheader.php';
?>

<style>
.election-container {
    width: 100%;
    display:flex;
    flex-direction: column;
    justify-content: space-evenly;
    background-color: white;
    padding: 3rem 40rem 4rem 40rem;
    min-height: calc(100vh - 11rem);
}
.election-container>h1{
    width: 100%;
    padding: 0.8rem 0.6rem;
    font-size: 2.7rem;
    font-weight: 500;
   text-decoration:bold;
    color: #ff5276;
    background: white;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
}

.election-card {
    width: 100%;
    color: var(--maintext);
    margin:0 0 3rem 0;
    height:15rem;
}


.election-body-wrapper {
    width: 100%;
    background-color: var(--clr);
    display:flex;
    height:15rem;
    align-items:center;
    justify-content:start;
    color: var(--maintext);
    border-radius: 0.5rem;
    margin-bottom: 3rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.election-card>h1 {
    width: 100%;
    padding: 0.8rem 0.6rem;
    font-size: 2.7rem;
    font-weight: 500;
    text-decoration:bold;
    color: #ff5276;
    background: white;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
}

.election-baner {
    width: 60%;
    height:100%;
    padding-top: 2rem;
    padding: 1rem;
}


.election-baner img {
    display: inline-block;
 
    width: 100%;
    height: 100%;
    background: #fdcaca;
    text-align: center;
}

.election-content {
    margin-top: 0.8rem;
    width: 40%;
}

.election-content h1 {
    width: 100%;
    font-size: 2.2rem;
    font-weight: 600;
    text-align: center;
    letter-spacing: 0.3rem;
    color: var(--maintext);
}


.poll h2 {
    font-size: 1.7rem;
    margin: 0.8rem 0;
    text-align: center;
    width: 100%;
}

.poll span {
    margin: 0 1.2rem;
    font-size: 2rem;
    font-weight: 580;
}

.desc {
    width: 100%;
    padding: 1rem;

    background: aliceblue;
    color: var(--maintext);
}

.desc p {
    font-size: 1.1rem;
    font-weight: 500;
    padding: 0;
    margin: 0;
}

.castbtn {
    width: 90%;
    margin: 1rem auto 0 auto;
}

.castbtn button {
    display: inline-block;
    width: 100%;
    padding: .8rem 0;
    color: var(--clr);
    background: var(--secclr);
    text-align: center;
    font-size: 1.6rem;
    font-weight: 500;
    outline: none;
    border: none;
    cursor: pointer;

}

.castbtn button:hover {
    outline: 2px solid #3db2ff;
    background: var(--clr);
    color: var(--maintext);
}
</style>
<div class="election-container">





    <!-- /************************************************************************************
                      Fetching Assembly Election WHERE electiontype='National' and `status`='active' "
************************************************************************************** */ -->
    <div class="election-card">
    <h1>General Assembly Election</h1>
        <?php
        $command = " SELECT * FROM elections WHERE electiontype='National' and `status`='active' " ;
        $query_run = mysqli_query($con, $command);
        if (mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
        ?>
        
        <div class="election-body-wrapper">
            <div class="election-baner">
                <?php echo '<img src="../uploads/electionposter/' . $row['poster'] . '"  alt="Election Banner"/>' ?>
            </div>
            <div class="election-content">

                <h1><?php echo $row['electionname'] ?></h1>
                <div class="poll">
                    <h2>Date of Poll<span>-</span><?php echo $row['pollingdate'] ?></h2>
                </div>
               
                <div class="castbtn">
                    <form action="castvote.php" method="POST">
                        <input type="hidden" name="elecname" value="<?php echo $row['electionname'] ?>">
                        <button type="submit" name="polling">Cast Vote
                        </button>
                    </form>
                </div>
            </div>

        </div>
    
    <?php

        } else {
            ?>
<div class="pqrs">
<h1>NO General Assembly Election</h1>
</div>
       <?php    
        }
        ?>
</div>
<style>
    .pqrs{
        width: 100%;
    height: 15rem;
    background: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    display: flex;
    border-radius: 0.5rem;
    justify-content: center;
    align-items: center;
    }
</style>

<!-- /************************************************************************************
                      Fetching State Election
************************************************************************************** */ -->
<?php
    $vid = $_SESSION['voteruid'];
    $command = " SELECT * FROM `voters` WHERE voterid='$vid' ";
    $query_run = mysqli_query($con, $command);
    $value = mysqli_fetch_assoc($query_run);
    $statename = $value['state'];
    ?>
<div class="election-card">
<h1><?php echo $statename." State Election" ?></h1>

    <?php
        $command = " SELECT * FROM elections WHERE  electionstate='$statename' and  `status`='active' ";
        $query_run = mysqli_query($con, $command);
        if (mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
        ?>
        
    <div class="election-body-wrapper">
    <div class="election-baner">
                <?php echo '<img src="../uploads/electionposter/' . $row['poster'] . '"  alt="Election Banner"/>' ?>
            </div>
            <div class="election-content">

                <h1><?php echo $row['electionname'] ?></h1>
                <div class="poll">
                    <h2>Date of Poll<span>-</span><?php echo $row['pollingdate'] ?></h2>
                </div>
               
                <div class="castbtn">
                    <form action="castvote.php" method="POST">
                        <input type="hidden" name="elecname" value="<?php echo $row['electionname'] ?>">
                        <button type="submit" name="polling">Cast Vote
                        </button>
                    </form>
                </div>
            </div>

        </div>
    
    <?php

        } else {
            ?>
            <div class="pqrs">
            <h1>NO State Election Available</h1>
            </div>
                   <?php    
        }
        ?>
</div>

</div>


















<!-- /************************************************************************************* */ -->
<?php

// $enddate = 'hey';
// $id = $row['electionid'];
// if ($enddate == 'hey') {
//     $sql = "UPDATE `elections` SET  `status`='Inactive' Where electionid= '$id' ";
//     $result = mysqli_query($con, $sql);
//     if ($result) {
//         $sql = "UPDATE `voters` SET  LSvotestatus= '-' ";
//         $result = mysqli_query($con, $sql);
//         if ($result) {
//             echo 'done';
//         }
//     }
// }
?>

<?php
include 'voterfooter.php';
?>