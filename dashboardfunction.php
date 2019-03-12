<?php

  include_once 'includes/dbh.inc.php';


  $getUsersQuery = "SELECT userID, username, washPoints, exposurePercentage isActive FROM appusers";

  if($users = mysqli_query($conn, $getUsersQuery)){
    while($getUsersRow = mysqli_fetch_row($users)){
      $
    }
  };
