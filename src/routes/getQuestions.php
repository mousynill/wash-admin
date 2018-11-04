<?php

$app->post('/getQuestions', function($request, $response){
require_once('../src/config/db.php');

  $videoID = $_POST['videoID'];

  $getQuestions = "SELECT * FROM videoquestions WHERE videoID = $videoID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($getQuestions);
    $questions = $stmt->fetchAll(PDO::FETCH_OBJ);

    if($stmt->rowCount() > 0){
      echo json_encode($questions);
    }else{
      echo '{"questions":"none"}';
    }
    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
