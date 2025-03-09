<?php
include '../database/security.php';
?>

<?php
if (isset($_POST['addelection'])) {
    extract($_POST);
    $banner = $_FILES['banner']['name'];
    $year = date("Y", strtotime($pollingdate));
    $tablename = 'assembly';
    if ($electiontype == 'National') {
        $tablename = $tablename . $year;
    } else {
        $tablename = $electionstate . $year;
    }
    $electionstate = '-';
    if ($electiontype == 'State') {
        $electionstate = $_POST['electionstate'];
    }

    //Insertion
    $sql = " INSERT INTO `elections`(`poster`,`electionname`, `pollingdate`, `electiontype`, `electionstate`,  `status`) VALUES ('$banner','$electionname','$pollingdate','$electiontype','$electionstate','active')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        move_uploaded_file($_FILES['banner']['tmp_name'], "../uploads/electionposter/" . $_FILES['banner']['name']);
        $_SESSION['successmsg'] = "Election Inserted Successfully";

        //Insert A new Table
        $command = " CREATE TABLE `$tablename` (`candidateid` int(255) PRIMARY KEY, `avatar` varchar(255), `name` varchar(255), `fathername` varchar(255), `dob` DATE, `gender` varchar(255), `email` varchar(255), `phoneno` varchar(255), `address` varchar(255), `state` varchar(255), `district` varchar(255), `zip`int(6), `constituency` varchar(255), `contestingfor` varchar(255) , `partyname` varchar(255), `votes` int(255))";
        $query_run = mysqli_query($con, $command);
        if ($query_run) {
            $cmd = "INSERT INTO result(`electionname`,`type`) Values ('$tablename','$electiontype')";
            $runqry =  mysqli_query($con, $cmd);
            if($runqry){
            header('Location: elections.php');
            }
            else{
                $_SESSION['errormsg'] = "Error : INSERTION FAILED IN RESULT";
            }
        } else {
            $_SESSION['errormsg'] = "Error : Election Table Creation Failed";
            header('Location: elections.php');
        }
    } else {
        $_SESSION['errormsg'] = "Election Updated Successfully";
        header('Location: elections.php');
    }
}
?>










