<?php

include '../database/security.php';
?>

<?php

// $id = $_POST['id'];
// echo $id;

// $sql = " SELECT * FROM `elections` WHERE electionid = '$id' ";
//     $query = mysqli_query($con, $sql);
//     $row =mysqli_fetch_assoc($query);
//     //changing array into variables
//     extract($row);
//     $tablename ='';
//     $year = date("y", strtotime($pollingdate));
    
//     if($electiontype == 'National'){
//         $tablename = 'loksabha' . $year;
//     }
//     else{
//         $tableres = $electionstate . $year;
//         $tablename = strtolower($tableres);
//     }

//     $_SESSION['tablename'] = $tablename;
 ?>



<?php
if (isset($_POST['addcandidate'])) {
    extract($_POST);
    $avatar = $_FILES['avatar']['name'];

    $sql = " SELECT * FROM `elections` WHERE electionname = '$contestingfor' ";
    $query = mysqli_query($con, $sql);
    $row =mysqli_fetch_assoc($query);
    extract($row);

    $year = date("Y", strtotime($pollingdate));
    $tablename = 'assembly';
    if ($electiontype == 'National') {
        $tablename = $tablename . $year;
    } else {
        $tablename = $electionstate . $year;
    }
    $electionstate = '-';
    if ($electiontype == 'State') {
        $electionstate = $state;
    }

    
     $sql = " INSERT INTO `$tablename` (`avatar`, `name`, `fathername`, `dob`, `gender`, `email`, `phoneno`, `address`, `state`, `district`, `zip`, `constituency`, `contestingfor`, `partyname`, `votes`) VALUES ('$avatar','$name','$fathername','$dob','$gender','$email','$mobile','$address','$state','$district','$pin','$constituency','$contestingfor','$partyname','0')";
     $result = mysqli_query($con, $sql);

    if ($result) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../uploads/candidateavatar/" . $_FILES['avatar']['name']);
       
        header('Location: candidates.php');
    } else {
        echo "Failed";
    }
}

?>