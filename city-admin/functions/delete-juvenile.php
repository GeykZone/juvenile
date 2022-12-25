<?php   include('../../route.php'); ?>

<?php
if (isset($_POST['juvenile_id_value']))
{
    $juvenile_id_value = $_POST['juvenile_id_value'];

    $sql = "DELETE FROM `jd_tbl` WHERE `jd_id` = '$juvenile_id_value'";
    $result = $conn->query($sql);

    if ($result == TRUE)
    {
      $confirmation = 4;
      echo $confirmation;
    }
    else
    {
      $confirmation = 2;
      echo $confirmation;
    }
}
?>