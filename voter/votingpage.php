<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$db = "evoting";
$con = mysqli_connect($server, $user, $password, $db);
?>

<?php
if (isset($_POST['votebtn'])){
    $vid = $_SESSION['voteruid'];
    $id = $_POST['cndid'];
    $tablename = $_POST['tablename'];
    //selecting the candidate that was clicked
    $command = " SELECT * FROM $tablename WHERE candidateid = '$id' ";
    $query_run = mysqli_query($con, $command);
    if($query_run){
        $row = mysqli_fetch_assoc($query_run);
        extract($row);
        $votes = $votes + 1;
        //updating the vote count by 1
        $sql = " UPDATE `$tablename` SET `votes`='$votes' WHERE candidateid = '$id' ";
        $query = mysqli_query($con, $sql);
        if ($query) {
            //selcting the candidate to update their vote status
            $sql = " SELECT * FROM voters WHERE voterid = '$vid' ";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $setval = 'Voted';
                $elecname = substr($tablename, 0, 8);
                if ($elecname == 'assembly') {
                    $sql = " UPDATE `voters` SET `LSvotestatus`='$setval' WHERE voterid = '$vid' ";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        header('location: upcomingelection.php');
                    }
                    else{
                        echo "Error While Updating";
                    }
                }
                else{
                    $sql = " UPDATE `voters` SET `Statevotestatus`='$setval' WHERE voterid = '$vid' ";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        header('Location: upcomingelection.php');
                    }
                    else{
                        echo "Error While Updating";
                    }
                }
            }
            else{
                echo "Error while fetching the voter";
            }
        }
        else{
            echo "Vote Updation Failed";
        }

    }
    else{
        echo " Error while fetching the candidate";
    }
}
else{
    echo "Error";
}
?>
    
    
       
        
            
