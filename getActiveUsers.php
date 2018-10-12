<?php
include_once 'includes/dbh.inc.php';

$getActiveUsersQuery = "SELECT COUNT(*) as NUM FROM appusers WHERE isActive = 1";
$theThingToReturn = '<h4 class="m-b-0">';


 if($getActiveUsers = mysqli_query($conn,$getActiveUsersQuery)){
   while($getActiveRow = mysqli_fetch_row($getActiveUsers)){
     $theCount = $getActiveRow[0];
     $theThingToReturn .= $theCount;

   }
 }

  $theThingToReturn .= "</h4>";

  echo $theThingToReturn;

?>
