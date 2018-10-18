<?php
include_once 'includes/dbh.inc.php';

$getActiveUsersQuery = "SELECT ComicTitle, count(UC.isLiked) AS Sum FROM comicstable AS CS JOIN userscomics AS UC ON CS.SeriesID = UC.seriesID GROUP BY UC.seriesID ORDER BY Sum DESC LIMIT 1";
$theThingToReturn = '<h4 class="m-b-0">';


 if($getActiveUsers = mysqli_query($conn,$getActiveUsersQuery)){
   while($getActiveRow = mysqli_fetch_row($getActiveUsers)){
     $theCount = $getActiveRow[0];
     if(strlen($theThingToReturn) > 15){
       $returnCut = substr($theCount, 0, 12);
       $theThingToReturn .= $returnCut;
       $theThingToReturn .= "..";
     }
   }
 }

  $theThingToReturn .= "</h4>";

  echo $theThingToReturn;

?>
