<?php   include('../../route.php'); ?>
<?php   include('barangay-admin-location.php'); ?>

<?php 
// Database connection info 
$dbDetails = array( 
    'host' => $hostname, 
    'user' => $username , 
    'pass' => $password, 
    'db'   => $database
); 
 
// DB table to use 
$table = 'jd_tbl'; 

 
// Table's primary key 
$primaryKey = 'jd_id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'fullname',    'dt' => 0, 'field' => 'fullname'), 
    array( 'db' => "DATE_FORMAT(dob,'%M %d, %Y')",    'dt' => 1, 'field' => "DATE_FORMAT(dob,'%M %d, %Y')"),
    array( 'db' => "CONCAT(' ', age, ' ')",    'dt' => 2, 'field' => "CONCAT(' ', age, ' ')"),
    array( 'db' => "CONCAT(' ', gender, ' ')",    'dt' => 3, 'field' => "CONCAT(' ', gender, ' ')"),
    array( 'db' => 'address',    'dt' => 4, 'field' => 'address'),
    array( 'db' => 'guardian_name',    'dt' => 5, 'field' => 'guardian_name'),
    array( 'db' => 'phone',    'dt' => 6, 'field' => 'phone'),
    array( 'db' => 'offense_name',    'dt' => 7, 'field' => 'offense_name'),
    array( 'db' => "DATE_FORMAT(date_of_offense,'%M %d, %Y')",    'dt' => 8, 'field' => "DATE_FORMAT(date_of_offense,'%M %d, %Y')"),
    array( 'db' => 'jd_id',    'dt' => 9, 'field' => 'jd_id'),
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 

$joinQuery = ", DATE_FORMAT(dob,'%M %d, %Y'), DATE_FORMAT(date_of_offense,'%M %d, %Y')  FROM `jd_tbl` AS `jd` LEFT JOIN `barangay_tbl` AS `bt` ON (`jd`.`barangay_tbl_id` = `bt`.`id`) LEFT JOIN `offense_tbl` AS `ot` ON (`jd`.`offense_id` = `ot`.`id`)";
$where = "`barangay_tbl_id` = '$admin_location_id'";


 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery,$where) 
);

?>






