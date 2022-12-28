<?php   include('../../route.php'); 
include('barangay-admin-location.php');

if(isset($_GET['offenses']))
{
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];


    $sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
    WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND `barangay_tbl_id` =' $admin_location_id' ORDER BY `offense_name` ASC";


    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $offense_name = $row['offense_name'];

            $new_sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
            WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND `barangay_tbl_id` =' $admin_location_id' AND offense_name = '$offense_name' ORDER BY `offense_name` ASC";

            $new_result = $conn->query($new_sql);
            if($new_result->num_rows > 0)
            {
                $new_result = mysqli_query($conn,$new_sql);
                $rowcount=mysqli_num_rows($new_result);
                $total_jv =  $rowcount;
            }
            else
            {
                $total_jv =  0;
            }
            

            $offenses = str_replace(' ', '_',$offense_name);
            $total_jv_number[] = $offenses." ".$total_jv;
        }
    }
    else
    {
        $offenses = str_replace(' ', '_', 'No Records Found');
        $total_jv_number[] = $offenses." ".'N/A';
    }

    $total_jv_number = array_unique($total_jv_number);
    print json_encode($total_jv_number);
}


if(isset($_GET['total_jv']))
{
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];

    $sql = "SELECT COUNT(*) AS total_jv FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
    WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to')  AND `barangay_tbl_id` =' $admin_location_id' ORDER BY `total_jv` ASC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    $total_jv[] = $row['total_jv'];

    }
    }
    print json_encode($total_jv);
}


if(isset($_GET['new_jv']))
{
    $date_range_to = $_GET['date_range_to'];

    $sql = "SELECT COUNT(*) AS total_jv FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
    WHERE date_of_offense = '$date_range_to'  AND `barangay_tbl_id` =' $admin_location_id' ORDER BY `total_jv` ASC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    $total_jv[] = $row['total_jv'];

    }
    }

    print json_encode($total_jv);
}

if(isset($_GET['jv_list']))
{
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
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];
    
    // Array of database columns which should be read and sent back to DataTables. 
    // The `db` parameter represents the column name in the database.  
    // The `dt` parameter represents the DataTables column identifier. 

    $columns = array( 
        array( 'db' => 'fullname',    'dt' => 0, 'field' => 'fullname'), 
        array( 'db' => 'age',    'dt' => 1, 'field' => 'age'),
        array( 'db' => 'gender',    'dt' => 2, 'field' => 'gender'),
        array( 'db' => 'address',    'dt' => 3, 'field' => 'address'),
        array( 'db' => 'offense_name',    'dt' => 4, 'field' => 'offense_name'),
        array( 'db' => 'barangay',    'dt' => 5, 'field' => 'barangay'),
        array( 'db' => "DATE_FORMAT(date_of_offense,'%M %d, %Y')",    'dt' => 6, 'field' => "DATE_FORMAT(date_of_offense,'%M %d, %Y')"),
    ); 
    
    // Include SQL query processing class 
    require 'ssp.class.php'; 

    $joinQuery = ", DATE_FORMAT(dob,'%M %d, %Y'), DATE_FORMAT(date_of_offense,'%M %d, %Y')  FROM `jd_tbl` AS `jd` LEFT JOIN `barangay_tbl` AS `bt` ON (`jd`.`barangay_tbl_id` = `bt`.`id`) LEFT JOIN `offense_tbl` AS `ot` ON (`jd`.`offense_id` = `ot`.`id`)";
    $where = "(`date_of_offense` BETWEEN '$date_range_from' AND '$date_range_to')  AND `barangay_tbl_id` =' $admin_location_id'";


    
    // Output data as json format 
    echo json_encode( 
        SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery,$where ) 
    );
}

?>

