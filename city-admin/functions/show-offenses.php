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
$table = 'offense_tbl'; 

 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'offense_name',    'dt' => 0, 'field' => 'offense_name')
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 


// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns) 
);

?>