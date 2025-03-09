<?php
require '../database/security.php';
?>

<?php

/********************************************************************************************* 
 *                     Insertion has been already done after the approval of the applicant
 ************************************************************************************************/


/****************************************************************************************************
 *                                              Delete Voter
 * **************************************************************************************************/
if(isset($_POST['delbtn'])){
    $id = $_POST['voterid'];
        $command = " DELETE  FROM voters WHERE voterid='$id' "; 
        $query_run = mysqli_query($con,$command);
        if($query_run)
        {
            header('Location: voters.php');
        }
}


/****************************************************************************************************
 *                                              UPDATE Voter
 * **************************************************************************************************/
if (isset($_POST['updatevoterinfo'])) {
    extract($_POST);
    $avatar = $_FILES['voterpic']['name'];
    $command = " UPDATE voters SET voterpic='$avatar', `votername`='$votername', email='$email', phoneno='$mobile', houseno='$house',street='$street', `state`='$state', district='$district', pincode='$pin', constituency='$constituency' WHERE voterid='$voterid' ";
    $query_run = mysqli_query($con, $command);
    if ($query_run) {
        move_uploaded_file($_FILES['voterpic']['tmp_name'], "../uploads/voterimg/".$_FILES['voterpic']['name']);
        header('Location: voters.php');
    }
}


?>