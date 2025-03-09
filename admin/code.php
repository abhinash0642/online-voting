<?php
include '../database/connection.php';
?>
<?php
$id = $_POST['id'];
$type = $_POST['type'];

if($type == 'district'){
$sql = " SELECT * FROM `district` WHERE statecode='$id' ";
}
else{
    $sql = " SELECT * FROM `constituency` WHERE districtcode='$id' "; 
}
$query = mysqli_query($con, $sql);
$html = '';
if (mysqli_num_rows($query) > 0) {
  while ($list = mysqli_fetch_assoc($query)) {
     $html.='<option id='.$list['id'].' value='.$list['name'].'>'.$list['name'].'</option>';
  }
}
echo $html;
?>


