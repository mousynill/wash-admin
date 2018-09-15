<?php

$app->post('/likeSeries', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $seriesID = $_POST['seriesID'];
  $actionID = $_POST['actionID'];

  $updateRelation = "UPDATE userscomics SET isLiked = $actionID WHERE userID = $userID AND seriesID = $seriesID";

  $insertRelation = "INSERT INTO userscomics(userID, seriesID, isLiked) VALUES ($userID, $seriesID, $actionID)";

  $checkRelation = "SELECT * FROM userscomics WHERE userID = $userID and seriesID = $seriesID";
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
