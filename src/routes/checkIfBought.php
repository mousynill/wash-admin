<?php

$app->post('/checkIfBought', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $videoID = $_POST['videoID'];

  $checkRelation = "SELECT * FROM uservideos WHERE userID = $userID and videoID = $videoID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($checkRelation);
    $relationExists = $stmt->fetch(PDO::FETCH_OBJ);
    $relation = var_export($relationExists, true);

    if($relation == 'false'){
        return json_encode('{"relation":"unbought"}');
      }else{
        if($relationExists->isBought == 0){
          return json_encode('{"relation":"unbought"}');
          //must return unliked relation
        }else if($relationExists->isBought == 1){
          return json_encode('{"relation":"bought"}');
          //must return liked relation
        }else{
          return json_encode('{"relation":"unbought"}');
          //must return unliked because relation does not exist
        }

    }

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
