<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$db = "evoting";
$con = mysqli_connect($server, $user, $password, $db);
?>

<?php
if (isset($_POST['changepwd'])) {
    $vid = $_SESSION['voteruid'];
    $password = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $cnfrmpassword = $_POST['cnfrmpassword'];

    $command = " SELECT * FROM `voters` WHERE voterid='$vid' ";
    $query_run = mysqli_query($con, $command);
    $row = mysqli_fetch_assoc($query_run);
    $dbpassword = $row['password'];
    if ($password == $dbpassword) {
        if ($newpassword == $cnfrmpassword) {
            $command = " UPDATE voters SET `password`='$newpassword' WHERE voterid='$vid' ";
            $query_run = mysqli_query($con, $command);
            if ($query_run) {
                header('Location: myprofile.php');
              
            } else 
            header('Location: myprofile.php');
                
                
                echo( "Password didnot Changed Try Again");
               
           
            }
        } else {
           
            
            
            echo "New Paswword and Confirm Password Mismatch";
           
      
        }
    } else {
        
        
        echo "You have entered  wrong Old password";
       
       
    }

?>