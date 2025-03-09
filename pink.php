<?php
 $to_email = "imdeepakkumar70@gmail.com";
 $subject = "VOTER ID UPDATE";
 $body = "Hey,  Your Voter Id is successfully approved and Your Voter Id isand your password is";
 $headers = "From: iamdeepakkumar32@gmail.com";
 if(mail($to_email, $subject, $body, $headers))
 {
     echo "Hello";
 }
 else{
     echo "Failed";
 }
?>
