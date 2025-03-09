<?php
session_start();
include 'database/connection.php';
?>


<?php
if (isset($_POST['register'])) {

  $avatar = $_FILES['voterpic']['name'];
  $dobprf = $_FILES['dobproof']['name'];
  $addprf = $_FILES['addproof']['name'];
  extract($_POST);

   




    //********************************************** */ INsertion Code
    $command = " INSERT INTO `applicants`(`id`, `voterpic`, `votername`, `dob`, `gender`, `email`, `phoneno`, `fathername`, `houseno`, `street`, `state`, `district`, `pin`, `constituency`, `dobproof`, `dobprooftype`, `addproof`, `addressprooftype`) VALUES ('','$avatar','$votername','$dob','$gender','$email','$mobile','$fathername','$house','$street','$state','$district','$pin','$constituency','$dobprf','$dobdoctype','$addprf','$addprftype')";
    $queryrun = mysqli_query($con, $command);

    if ($queryrun) {
      move_uploaded_file($_FILES['voterpic']['tmp_name'], "uploads/voterimg/" . $_FILES['voterpic']['name']);
      move_uploaded_file($_FILES['dobproof']['tmp_name'], "uploads/dobproofs/" . $_FILES['dobproof']['name']);
      move_uploaded_file($_FILES['addproof']['tmp_name'], "uploads/addressproofs/" . $_FILES['addproof']['name']);

?>
      <script>
        alert("INSERTED");
      </script>
    <?php
      header('Location: login.php');
    } else {
    ?>
      <script>
        alert("INSERTED FAILED");
      </script>
<?php

    }
  } else {
    header('Location: register.php');
  }

?>