<?php

$app->post('/likeVideo', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $videoID = $_POST['videoID'];
  $actionID = $_POST['actionID'];

  $updateRelation = "UPDATE uservideos SET isLiked = $actionID WHERE userID = $userID AND videoID = $videoID";

  $insertRelation = "INSERT INTO uservideos(userID, videoID, isLiked) VALUES ($userID, $videoID, $actionID)";

  $checkRelation = "SELECT * FROM uservideos WHERE userID = $userID and videoID = $videoID";
  //if the query returns no row, then use INSERT instead of UPDATE

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($checkRelation);
    $relationExists = count($stmt->fetchAll(PDO::FETCH_ASSOC));

    if($relationExists > 0){
        $db->exec($updateRelation);
    }else{
        $db->exec($insertRelation);
    }

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
