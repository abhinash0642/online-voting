<?php
include '../database/security.php';
?>


<?php
if (isset($_POST['changebtn'])) {
    $id = $_SESSION['adminuid'];
    $password = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $cnfrmpassword = $_POST['cnfrmpassword'];

    $command = " SELECT * FROM `admin` WHERE id='$id' ";
    $query_run = mysqli_query($con, $command);
    if($query_run){
    $row = mysqli_fetch_assoc($query_run);
    $dbpassword = $row['password'];
    if ($password == $dbpassword) {
        if ($newpassword == $cnfrmpassword) {
            $command = " UPDATE `admin` SET `password`='$newpassword' WHERE id='$id' ";
            $query_run = mysqli_query($con, $command);
            if ($query_run) {
                
                echo "Password Successfully Updated";
                header('Location: myprofile.php');
            } else {
                echo "Password did not Changed Try Again";
            }
        } else {
            echo "New Password and Confirm Password Mismatch";
        }
    } else {
        echo "You have entered  wrong Old password";
    }
}
else{
    echo "Error : Fetchiing of admin Failed";
}
}
?>