<?php   include('../../route.php'); ?>

<?php

if(isset($_GET['offenses']))
{
    $query_click = $_GET['query_click'];
    $crime_location = $_GET['crime_location'];
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];
    $gender = $_GET['gender'];
    $max_age = $_GET['max_age'];
    $min_age = $_GET['min_age'];

    if($query_click == 'unclicked')
    {
        $sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
        WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') ORDER BY `offense_name` ASC";
    }
    else
    {
        $query = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)";

        $conditions = array();
        
        if($crime_location != "default")
        {
            $conditions[] = "`barangay_tbl_id`='$crime_location'";
        }
        if($gender != "default")
        {
            $conditions[] = "`gender`='$gender'";
        }
        if($min_age != "default")
        {
            $conditions[] = "`age` >= '$min_age'";
        }
        if($max_age != "default")
        {
            $conditions[] = "`age` <= '$max_age'";
        }

        $sql = $query;
        if (count($conditions) > 0) {
          $sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND " . implode(' AND ', $conditions) . " ORDER BY `offense_name` ASC ";
        }
        else
        {
            $sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') ORDER BY `offense_name` ASC ";
        }

    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $offense_name = $row['offense_name'];

            if($query_click == 'unclicked')
            {
                $new_sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
                WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND offense_name = '$offense_name' ORDER BY `offense_name` ASC";
            }
            else
            {

                $new_query = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)";

                $new_condition = array();
                
                if($crime_location != "default")
                {
                    $new_condition[] = "`barangay_tbl_id`='$crime_location'";
                }
                if($gender != "default")
                {
                    $new_condition[] = "`gender`='$gender'";
                }
                if($min_age != "default")
                {
                    $new_condition[] = "`age` >= '$min_age'";
                }
                if($max_age != "default")
                {
                    $new_condition[] = "`age` <= '$max_age'";
                }
        
                $new_sql = $new_query;
                if (count($new_condition) > 0) {
                  $new_sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND " . implode(' AND ', $conditions) . " AND offense_name = '$offense_name' ORDER BY `offense_name` ASC";
                }
                else
                {
                    $new_sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND offense_name = '$offense_name' ORDER BY `offense_name` ASC ";
                }
        
            }

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

if(isset($_GET['time']))
{
    $query_click = $_GET['query_click'];
    $crime_location = $_GET['crime_location'];
    $offense_type = $_GET['offense_type'];
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];
    $gender = $_GET['gender'];
    $max_age = $_GET['max_age'];
    $min_age = $_GET['min_age'];

    if($query_click == 'unclicked')
    {
        $sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
        WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') ORDER BY `date_of_offense` ASC";
    }
    else
    {
        $query = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)";

        $conditions = array();
        
        if($offense_type != "default")
        {
            $conditions[] = "`offense_id`='$offense_type'";
        }
        if($crime_location != "default")
        {
            $conditions[] = "`barangay_tbl_id`='$crime_location'";
        }
        if($gender != "default")
        {
            $conditions[] = "`gender`='$gender'";
        }
        if($min_age != "default")
        {
            $conditions[] = "`age` >= '$min_age'";
        }
        if($max_age != "default")
        {
            $conditions[] = "`age` <= '$max_age'";
        }

        $sql = $query;
        if (count($conditions) > 0) {
          $sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') AND " . implode(' AND ', $conditions) . " ORDER BY `date_of_offense` ASC ";
        }
        else
        {
            $sql .= " WHERE (date_of_offense BETWEEN '$date_range_from' AND '$date_range_to') ORDER BY `date_of_offense` ASC ";
        }

    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $date_of_offense = $row['date_of_offense'];

            if($query_click == 'unclicked')
            {
                $new_sql = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)
                WHERE date_of_offense = '$date_of_offense' ORDER BY `date_of_offense` ASC";
            }
            else
            {

                $new_query = "SELECT * FROM `jd_tbl` AS `j` LEFT JOIN `barangay_tbl` AS `b` ON (`j`.`barangay_tbl_id` = `b`.`id`) LEFT JOIN `offense_tbl` AS `o` ON (`j`.`offense_id` = `o`.`id`)";

                $new_condition = array();
                
                if($offense_type != "default")
                {
                    $new_condition[] = "`offense_id`='$offense_type'";
                }
                if($crime_location != "default")
                {
                    $new_condition[] = "`barangay_tbl_id`='$crime_location'";
                }
                if($gender != "default")
                {
                    $new_condition[] = "`gender`='$gender'";
                }
                if($min_age != "default")
                {
                    $new_condition[] = "`age` >= '$min_age'";
                }
                if($max_age != "default")
                {
                    $new_condition[] = "`age` <= '$max_age'";
                }
        
                $new_sql = $new_query;
                if (count($new_condition) > 0) {
                  $new_sql .= " WHERE date_of_offense = '$date_of_offense' AND " . implode(' AND ', $conditions) . " ORDER BY `date_of_offense` ASC";
                }
                else
                {
                    $new_sql .= " WHERE date_of_offense = '$date_of_offense' ORDER BY `date_of_offense` ASC ";
                }
        
            }

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
            
            $formattedDate = (new DateTime($date_of_offense))->format('F d, Y');
            $offenses_date = str_replace(' ', '_',$formattedDate);
            $total_jv_number[] = $offenses_date." ".$total_jv;
        }
    }
    else
    {
        $offenses_date = "Invalid_date Invalid";
        $total_jv_number[] = $offenses_date;
    }

    $total_jv_number = array_unique($total_jv_number);
    print json_encode($total_jv_number);
}

?>