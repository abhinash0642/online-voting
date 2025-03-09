<!-- ADMIN LOGIN CODING -->
<?php
include 'database/security.php';

if (isset($_POST['adminlogin'])) {
  $email = $_POST['adminemail'];
  $password = $_POST['adminpassword'];

  $adminsearch = " select * from admin where email='$email' ";
  $query = mysqli_query($con, $adminsearch);
  $email_count = mysqli_num_rows($query);

  if ($email_count) {
    $result = mysqli_fetch_assoc($query);
    $dbpassword = $result['password'];
    echo $dbpassword;
    if ($password == $dbpassword) {
      $_SESSION['adminuid'] = $result['id'];
      header('location: admin/dashboard.php');
    } else {
      $_SESSION['errormsg'] = "EmailId And Password Mismatch";
      header('location: login.php');
    }
  } else {
    $_SESSION['errormsg'] = "EmailId Doesnot Exist";
    header('location: login.php');

  }
}
?>