<?php   include('../../route.php'); ?>

<?php
if (isset($_POST['admin_id']))
{
    $barangayname_id = $_POST['admin_id'];

    $sql = "DELETE FROM `users` WHERE `users_id` = '$barangayname_id'";
    $result = $conn->query($sql);

    if ($result === TRUE)
    {
      $confirmation = 4;
      echo $confirmation;
    }
}
?>