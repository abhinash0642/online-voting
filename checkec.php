
<?php

$sqw = " select * from elections where status='Active'";
$quey = mysqli_query($con, $sqw);
if (mysqli_num_rows($quey) > 0) {
 while($rw= mysqli_fetch_assoc($quey)){
     $id = $rw['electionid'];
    $pd = $rw['pollingdate'];
    $ddt = date('Y-m-d', strtotime($pd. ' +2 days'));
    $cd = date('Y-m-d');
    $etype = $rw['electiontype'];
    $estate = $rw['electionstate'];
    if($ddt == $cd){
$upsql = "UPDATE elections set status='Inactive' where electionid='$id'";
$qrry =  mysqli_query($con, $upsql);
if($qrry){
    if($etype == 'National'){
        $upsqle = "UPDATE voters set LSvotestatus='-'";
        $qur =  mysqli_query($con, $upsqle);
        if(!qur){
            echo "Error: Has Occured";
        }  
    }
    else{
        $upsqls = "UPDATE voters set Statevotestatus='-' where `state1='$estate'";
        $qurr =  mysqli_query($con, $upsqls);
        if(!qurr){
            echo "Error: Has Occured in the State Part";
        }  
    }
}

    }
}
}
?>