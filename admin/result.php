<?php
include 'masterfile/header.php';

include 'masterfile/sidebar.php';
titlename("Results");

?>
<link rel="stylesheet" href="css/result.css">
<h1 class="pagetitle"> Election Result</h1>
</div>

<div class="resultsection">
    <div class="resultbody">
        <div class="heading">Ongoing Elections</div>
        <div class="resultcards">

            <?php
            $sql = " SELECT * FROM elections where status = 'active' ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $year = date("Y", strtotime($row['pollingdate']));

            ?>
                    <div class="resultcard">
                        <h1><?php echo $row['electionname'] ?></h1>
                        <h1><?php echo $year ?></h1>
                        <form action="showresult.php" method="POST">
                            <input type="hidden" name="electionid" value="<?php echo $row['electionid'] ?>">
                            <button name="viewresultbtn" class="resultbtn">View result</button>
                        </form>
                    </div>


            <?php
                }
            } else {
                echo "No Active election";
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'masterfile/footer.php';
?>