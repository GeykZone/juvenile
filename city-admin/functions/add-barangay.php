<?php   include('../../route.php'); ?>
<?php
//add new barangay
if(isset($_POST['barangay']))
{
  $barangay = $_POST['barangay'];
  $barangay = ucwords($barangay);//to make evry first leeter capitalize//


  $sql = "INSERT INTO `barangay_tbl`(`barangay`) VALUES ('$barangay')";
  if ($conn->query($sql) === TRUE)
  {
    $confirmation = 1;
    echo $confirmation;
  }
  else {

    $confirmation = 2;
    echo $confirmation;

  }
}
//add new barangay end

?>