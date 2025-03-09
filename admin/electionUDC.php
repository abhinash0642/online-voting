<?php
require '../database/security.php';
?>



<?php
/***********************************************************************************
 * Updation
 */
if (isset($_POST['updateelction'])) {
    $eid = $_POST['electionid'];
    $banner = $_FILES['banner']['name'];
    extract($_POST);
if ($banner == '') {
    $command = " UPDATE elections SET electionname='$electionname', pollingdate='$pollingdate' WHERE electionid='$eid' ";
} else {
    $command = " UPDATE elections SET poster='$banner', electionname='$electionname',pollingdate='$pollingdate' WHERE electionid='$eid' ";
}
$query_run = mysqli_query($con, $command);
    if ($query_run) {
        move_uploaded_file($_FILES['banner']['tmp_name'], "../uploads/electionposter/" . $_FILES['banner']['name']);
        $_SESSION['successmsg'] = "Election Updated Successfully";
        header('Location: elections.php');
    }
    else{
        $_SESSION['errormsg'] = "ERROR: Updation  Failed";
    header('Location: elections.php');
    }
}
?>

<?php
/*******************************************************************************************
 *                                        DEletion
 *******************************************************************************************/
//FIXME: Delete the created table when admin delete a particular elction 
if (isset($_POST['deletebtn'])) {
    $eid = $_POST['electionid'];
$sql = " DELETE FROM `elections` where electionid = '$eid' ";
$query_run = mysqli_query($con, $sql);
if ($query_run) {
    $_SESSION['successmsg'] = "Election Deleted Successfully";
    header('Location: elections.php');
}
else{
    $_SESSION['errormsg'] = "ERROR: Deletion Failed";
    header('Location: elections.php');
}
}
?>