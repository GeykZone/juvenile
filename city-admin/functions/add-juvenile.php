<?php   include('../../route.php'); ?>
<?php
if(isset($_POST['crime_location']))
{
    $crime_location  = $_POST['crime_location'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $offense = $_POST['offense'];
    $date_of_offense = $_POST['date_of_offense'];
    $contact_num = $_POST['contact_num'];
    $guardian_name = $_POST['guardian_name'];

    $full_name = ucwords($full_name);
    $address = ucwords($address);
    $guardian_name = ucwords($guardian_name);
  
    $sql = "INSERT INTO `jd_tbl`(`fullname`, `guardian_name`, `address`, `barangay_tbl_id`, `dob`, `age`, `gender`, `phone`, `offense_id`, `date_of_offense`) 
    VALUES ('$full_name', '$guardian_name', '$address', '$crime_location', '$birthdate', '$age', '$gender', '$contact_num', '$offense', '$date_of_offense')";
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
?>