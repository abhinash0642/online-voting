<?php
require '../database/security.php';
?>
<?php
/****************************************************************************************************
 *                                              Delete CANDIDATE
 * **************************************************************************************************/
if(isset($_POST['delbtn'])){
    $tablename = $_POST['tablename'];
    $id = $_POST['candidateid'];
        $command = " DELETE  FROM `$tablename` WHERE candidateid='$id' "; 
        $query_run = mysqli_query($con,$command);
        if($query_run)
        {
            $_SESSION['successmsg'] = "Candidate Deleted Successfully";
            header('Location: candidates.php');
        }
    else
    {
        $_SESSION['errormsg'] = "ERROR: Deletion of Candidate Failed";
        header('Location: candidates.php');
    }
}
?>
<?php
/****************************************************************************************************
 *                                              UPDATE  CANDIDATE
 * **************************************************************************************************/
if(isset($_POST['updatecandidate'])){
    extract($_POST);
    $avatar = $_FILES['avatar']['name'];
    $sql = " SELECT * FROM `elections` WHERE electionname = '$electionname' ";
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
    

    $cmd = "UPDATE `$tablename` SET `avatar`='$avatar',`name`='$name',`fathername`='$fathername',`dob`='$dob',`gender`='$gender',`email`='$email',`phoneno`='$mobile',`address`='$address',`state`='$state',`district`='$district',`zip`='$pin',`constituency`='$constituency',`contestingfor`='$electionname',`partyname`='$partyname' WHERE candidateid = '$cndid'";
    $result = mysqli_query($con, $cmd);
    if ($result) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../uploads/candidateavatar/" . $_FILES['avatar']['name']);
       
        header('Location: candidates.php');
    } else {
        echo "Failed";
    }
}

?>