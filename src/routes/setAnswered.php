<?php

$app->post('/setAnswered', function($request, $response){
require_once('../src/config/db.php');

  $videoID = $_POST['videoID'];
  $userID = $_POST['userID'];

  $setAnswered = "UPDATE uservideos SET isAnswered = 1 WHERE userID = $userID AND videoID = $videoID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($setAnswered);
    $stmt->execute();
    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
