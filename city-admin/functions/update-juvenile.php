<?php   include('../../route.php'); ?>
<?php
 if (isset($_POST['juvenile_id_value'])) {

    $crime_location = $_POST['crime_location'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $offense = $_POST['offense'];
    $date_of_offense = $_POST['date_of_offense'];
    $contact_num = $_POST['contact_num'];
    $guardian_name = $_POST['guardian_name'];
    $juvenile_id_value = $_POST['juvenile_id_value'];

    $full_name = ucwords($full_name);
    $address = ucwords($address);
    $guardian_name = ucwords($guardian_name);

    $sql = "UPDATE `jd_tbl` 
    SET `fullname`='$full_name',`guardian_name`='$guardian_name',`address`='$address',`barangay_tbl_id`='$crime_location',
    `dob`='$birthdate',`age`='$age',`gender`='$gender',`phone`='$contact_num',`offense_id`='$offense',`date_of_offense`='$date_of_offense' 
    WHERE `jd_id`='$juvenile_id_value' ";
    if ($conn->query($sql) === TRUE)
    {
      $confirmation = 3;
      echo $confirmation;
    }
    else
    {
      $confirmation = 2;
      echo $confirmation;
    }

  
 }
?>

