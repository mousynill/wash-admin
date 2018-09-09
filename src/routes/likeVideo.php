<?php

$app->post('/likeVideo', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $videoID = $_POST['videoID'];

  //add another parameter to check if the user liked or unliked 
  //$userAction = $_POST['userAction'];

  $updateRelation = "UPDATE uservideo SET isLiked = 1 WHERE userID = $userID AND videoID = $videoID";

  $insertRelation = "INSERT INTO uservideos(userID, videoID, isLiked) VALUES ($userID, $videoID, 1)";

  $checkRelation = "SELECT * FROM uservideo WHERE userID = $userID and videoID = $videoID";
  //if the query returns no row, then use INSERT instead of UPDATE

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($checkRelation);
    $relationExists = $stmt->fetch(PDO::FETCH_OBJ);
    $relation = var_export($relationExists, true);

    echo $relation;

    if($relation == 'false'){
        $insertStmt = $db->prepare($insertRelation);
        $insertStmt =$db->execute();

    }else if($relation == 'true'){
      $updateStmt = $db->prepare($updateRelation);
      $updateStmt =$db->execute();

    }

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
