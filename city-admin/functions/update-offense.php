<?php   include('../../route.php'); ?>
<?php
 if (isset($_POST['update_offense'])) {
    $offense_id = $_POST['offense_name_id'];
    $update_offense = $_POST['update_offense'];
    $update_offense = ucfirst($update_offense);


    //update
    $sql = "UPDATE `offense_tbl` SET `offense_name`= '$update_offense' WHERE  `offense_name`= '$offense_id'";
    if ($conn->query($sql) === TRUE)
    {
      $confirmation = 3;
      echo $confirmation;
      
    }
    // code...
  
 }
  ?>

