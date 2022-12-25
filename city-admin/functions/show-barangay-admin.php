<?php   include('../../route.php'); ?>

<?php 
// Database connection info 
$dbDetails = array( 
    'host' => $hostname, 
    'user' => $username , 
    'pass' => $password, 
    'db'   => $database
); 
 
// DB table to use 
$table = 'users'; 

 
// Table's primary key 
$primaryKey = 'users_id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'barangay',    'dt' => 0, 'field' => 'barangay'),
    array( 'db' => 'username', 'dt' => 1, 'field' => 'username' ), 
    array( 'db' => "(CASE WHEN status = 1 THEN 'Admin-Activated' WHEN status = 0 THEN 'Admin-Deactivated' END)",  'dt' => 2, 'field' => "(CASE WHEN status = 1 THEN 'Admin-Activated' WHEN status = 0 THEN 'Admin-Deactivated' END)" ), 
    array( 'db' => 'users_id',  'dt' => 3, 'field' => 'users_id' ), 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 

$joinQuery = ", (CASE WHEN status = 1 THEN 'Admin-Activated' WHEN status = 0 THEN 'Admin-Deactivated' END) FROM `users` AS `us` LEFT JOIN `barangay_tbl` AS `bt` ON (`us`.`barangay_tbl_id` = `bt`.`id`)";
$where = "`role`=2";


 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery, $where ) 
);

?>






