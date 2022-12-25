<?php   include('../../route.php'); ?>
<?php
//add new barangay
if(isset($_POST['offense']))
{
  $offense = $_POST['offense'];
  $offense = ucwords($offense);//to make evry first leeter capitalize//


  $sql = "INSERT INTO `offense_tbl`(`offense_name`) VALUES ('$offense')";
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