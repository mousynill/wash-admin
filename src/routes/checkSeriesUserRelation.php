<?php

$app->post('/checkSeriesUser', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $seriesID = $_POST['seriesID'];

  $checkRelation = "SELECT * FROM userscomics WHERE userID = $userID and seriesID = $seriesID";
  //if the query returns no row, then use INSERT instead of UPDATE

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($checkRelation);
    $relationExists = $stmt->fetch(PDO::FETCH_OBJ);
    $relation = var_export($relationExists, true);

    if($relation == 'false'){
        return json_encode('{"relation":"unliked"}');
      }else{
        if($relationExists->isLiked == 0){
          return json_encode('{"relation":"unliked"}');
          //must return unliked relation
        }else if($relationExists->isLiked == 1){
          return json_encode('{"relation":"liked"}');
          //must return liked relation
        }else{
          return json_encode('{"relation":"unliked"}');
          //must return unliked because relation does not exist
        }

    }

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
