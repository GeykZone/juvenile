<?php   include('../../route.php'); ?>
<?php
 if (isset($_POST['update_barangay'])) {
    $name_id = $_POST['barangay_name_id'];
    $update_barangay = $_POST['update_barangay'];
    $update_barangay = ucwords($update_barangay);


    //update
    $sql = "UPDATE `barangay_tbl` SET `barangay`= '$update_barangay' WHERE  `barangay`= '$name_id'";
    if ($conn->query($sql) === TRUE)
    {
      $confirmation = 3;
      echo $confirmation;
      
    }
    // code...
  
 }
?>

