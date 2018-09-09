<?php

$app->post('/addView', function($request, $response){
require_once('../src/config/db.php');

  $videoID = $_POST['videoID'];

  $searchUser = "UPDATE videostable SET viewCount = viewCount + 1 WHERE IdNo = $videoID ";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($searchUser);
    $stmt->execute();
    $db = null;
    
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
