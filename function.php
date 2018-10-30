<?php

  include_once 'includes/dbh.inc.php';

  for ($i=1; $i < 6; $i++) {
    // code...
  echo $_POST['question'.$i].'question'.$i.'<br>';
    echo $_POST['ans'.$i.'A'].'ans'.$i.'A'.'<br>';
    echo $_POST['ans'.$i.'B'].'ans'.$i.'B'.'<br>';
    echo  $_POST['ans'.$i.'C'].'ans'.$i.'C'.'<br>';
    echo  $_POST['optradio'.$i].'optradio'.$i.'<br>';
  }
?>
