<?php
 include '../database/security.php';
?>

<?php
 if(isset($_POST['logoutbtn'])){
      session_destroy();
      unset($_SESSION['adminuid']);
      header('Location: ../login.php');
 }
?>


