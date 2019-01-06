<?php

$app->post('/checkIfAnswered', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $videoID = $_POST['videoID'];

  $query = "SELECT isAnswered FROM uservideos WHERE userID = $userID AND videoID = $videoID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($query);
    $relationExists = $stmt->fetch(PDO::FETCH_OBJ);

  if( $stmt->rowCount() > 0){
    $relation = var_export($relationExists->isAnswered, true);
  }else{
    $relation = NULL;
  }


    if($relation == NULL){
        return '{"isAnswered":"false"}';
      }else{

        if($relationExists->isAnswered == 0){
          return '{"isAnswered":"false"}';
          //must return unliked relation
        }else if($relationExists->isAnswered == 1){
          return '{"isAnswered":"true"}';
          //must return liked relation
        }else{
          return '{"isAnswered":"false"}';
          //must return unliked because relation does not exist
        }

    }


    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
