<?php   include('../../route.php'); ?>

<?php
if (isset($_POST['offense_name_id']))
{
    $offense_id = $_POST['offense_name_id'];

    $sql = "DELETE FROM `offense_tbl` WHERE `offense_name` = '$offense_id'";
    $result = $conn->query($sql);

    if ($result == TRUE)
    {
      $confirmation = 4;
      echo $confirmation;
    }
}
?>