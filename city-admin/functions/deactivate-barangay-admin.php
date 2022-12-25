<?php   include('../../route.php'); ?>
<?php
 if (isset($_POST['admin_id'])) {
    $admin_id = $_POST['admin_id'];
    $activated = 0;

    //update
    $sql = "UPDATE `users` SET `status`= '$activated' WHERE  `users_id`= '$admin_id'";
    if ($conn->query($sql) === TRUE)
    {
      $confirmation = 6;
      echo $confirmation;
    }
    // code...
 }
  ?>