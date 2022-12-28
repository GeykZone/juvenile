<?php
  $sql = "SELECT * FROM `offense_tbl`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['offense_name']; ?></option>
      <?php 
      
    }
    ?>
    <?php
      }
    ?>