<?php
  $sql = "SELECT * FROM `barangay_tbl`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($resident_pick == "set")
      {
        ?>
      <option value="<?php echo $row['barangay']; ?>"><?php echo $row['barangay']; ?></option>
      <?php 
      }
      else
      {
        ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['barangay']; ?></option>
      <?php 
      }
      
    }
    ?>
    <?php
      }
    ?>