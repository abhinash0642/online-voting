<?php
include '../database/security.php';
?>

<?php

/*==============================================================================================================
                                    INSERT A NEW POLITICAL PARTY
==============================================================================================================*/
if (isset($_POST['addparty'])) {

    $symbol = $_FILES['symbol']['name'];
    $name = $_POST['partyname'];
    $type = $_POST['partytype'];
    $partystate = '-';
    if($type == 'State'){
    $partystate = $_POST['partystate'];
    }


    $command = " INSERT INTO politicalparty (`symbol`, `partyname`, `partytype`,`statename`) VALUES ('$symbol','$name','$type','$partystate')";
    $queryrun = mysqli_query($con, $command);

    if ($queryrun) {
        move_uploaded_file($_FILES['symbol']['tmp_name'], "../uploads/partysymbols/" . $_FILES['symbol']['name']);
        $_SESSION['successmsg'] = "Party Inserted Successfully";
        header('Location: politicalparties.php');
    } else {
        $_SESSION['errormsg'] = "ERROR: Insertion Failed";
        header('Location: politicalparties.php');
    }
}
?>




<?php
/*==============================================================================================================
                                    UPDATE A PARTY
==============================================================================================================*/


if (isset($_POST['updateparty'])) {
    $pid = $_POST['id'];
    $symbol = $_FILES['symbol']['name'];
    $name = $_POST["partyname"];
    $type = $_POST["partytype"];
    $pstate = '-';
    if($type == 'State')
    {
    $pstate = $_POST['partystate'];
    }
    if ($symbol == '') {
        $command = " UPDATE politicalparty SET  partyname='$name', partytype='$type', statename='$pstate' WHERE partycode='$pid' ";
    } else {
        $command = " UPDATE politicalparty SET symbol='$symbol', partyname='$name', partytype='$type', statename='$pstate' WHERE partycode='$pid' ";
    }
    $query_run = mysqli_query($con, $command);
    if ($query_run) {
        move_uploaded_file($_FILES['symbol']['tmp_name'], "../uploads/partysymbols/" . $_FILES['symbol']['name']);
        $_SESSION['successmsg'] = "Party Updated Successfully";
        header('Location: politicalparties.php');
    }
    else{
        $_SESSION['errormsg'] = "ERROR: Updation Failed";
        header('Location: politicalparties.php');

    }
}
?>



<?php
/*==============================================================================================================
                                    REMOVE A PARTY
==============================================================================================================*/

if (isset($_POST['rmvbtn'])) {
    $pid = $_POST['id'];
    $command = " DELETE  FROM politicalparty WHERE partycode='$pid' ";
    $query_run = mysqli_query($con, $command);
    if ($query_run) {
        $_SESSION['successmsg'] = "Party Deleted Successfully";
        header('Location: politicalparties.php');
    } else {
        $_SESSION['errormsg'] = "ERROR: Deletion Failed";
        header('Location: politicalparties.php');

    }
}


?>