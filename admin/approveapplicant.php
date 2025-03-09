<?php
include '../database/security.php';
?>


<?php
if(isset($_POST['approve'])){
    $id = $_POST['approvalvoterid'];
    
    $command = " SELECT * FROM applicants WHERE id='$id' "; 
    $query_run = mysqli_query($con,$command);
    //changing object into associative array
    $row =mysqli_fetch_assoc($query_run);
    //changing array into variables
    extract($row);
    
    //Generating Voterid
     
    $getvid = " SELECT * FROM voters ORDER BY voterid DESC LIMIT 1 ";
    $query_run = mysqli_query($con, $getvid);
    $vidpattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $sflptrn = str_shuffle($vidpattern);
    $alpha = substr($sflptrn, 0, 6);
    $yr =  date('y');
    $voterid;
    if (mysqli_num_rows($query_run) > 0) {
        if($row = mysqli_fetch_assoc($query_run)) {
            $vid = $row['voterid'];    
            $len = strlen($vid);
            $getlen = $len-8 ;
            $getnum = substr($vid, 0, $getlen);
            $add = (int)$getnum + 1;
            $ans = (string)$add. $yr .$alpha;
            $voterid = strtoupper($ans);
        }
    } else {
        $x = "1";
        $ans = $x. $yr .$alpha ;
        $voterid = strtoupper($ans);
    }

    //Generating Password
    $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTTUVWXYZ!@#$%^&*()';
    $shuffle = str_shuffle($pattern);
    $password = substr($shuffle,0,10);

    $sql =" INSERT INTO voters (`voterid`, `votername`, `voterpic`, `dateofbirth`, `gender`, `fathername`, `email`, `phoneno`, `password`, `houseno`, `street`, `state`, `district`, `pincode`, `constituency`,`LSvotestatus`, `Statevotestatus`) VALUES ('$voterid','$votername','$voterpic','$dob','$gender','$fathername','$email','$phoneno','$password','$houseno','$street','$state','$district','$pin','$constituency','-','-')";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $to_email = "$email";
        $subject = "VOTER ID UPDATE";
        $body = "Hey $votername,  Your Voter Id is successfully approved and Your Voter Id is $voterid and your password is $password";
        $headers = "From: iamdeepakkumar32@gmail.com";
        if(mail($to_email, $subject, $body, $headers))
        {
            $command = " DELETE  FROM applicants WHERE id='$id' "; 
            $query_run = mysqli_query($con,$command);
            if($query_run)
            {
                header('Location: applicants.php');
            }
            else
            {
                echo "Error DELETION";
            }
      }
         else
         {
                echo " Mail Sending Failed";
 }
    }        
}
?>