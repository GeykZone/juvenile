<?php

$sql= "SELECT * FROM `users` AS `us` LEFT JOIN `barangay_tbl` AS `bt` ON (`us`.`barangay_tbl_id` = `bt`.`id`) WHERE `us`.`users_id` = '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
    while($row = $result->fetch_assoc()) 
    {
        $admin_location = $row['barangay'];
        $admin_location_id = $row['barangay_tbl_id'];
    }

    $admin_location = strtoupper($admin_location);
}

?>