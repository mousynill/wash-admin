<?php

  include_once 'includes/dbh.inc.php';


  $getUsersQuery = "SELECT userID, username, washPoints, exposurePercentage, isActive FROM appusers";

  if($users = mysqli_query($conn, $getUsersQuery)){
    while($getUsersRow = mysqli_fetch_row($users)){
      $userID = $getUsersRow[0];
      $userName = $getUsersRow[1];
      $wPoints = $getUsersRow[2];
      $ePercent = $getUsersRow[3];
      $status = $getUsersRow[4];

      ?>
      <tr>
        <td><?php echo $userID?> </td>
        <td><?php echo $userName?> </td>
        <td><?php echo $wPoints?> </td>
        <td><?php echo $ePercent?> </td>
        <td><?php echo $status?> </td>
      </tr>
      <?php
    }
  };
?>
