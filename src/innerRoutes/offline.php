<?php

require_once('../src/config/db.php');
// require_once('../assets/objects/ruling.json');

$app->post('/offline', function($request, $response){

  $userID = $_POST['userID'];

  $setOffline =  "UPDATE appusers SET isActive = 0 WHERE userID = $userID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($setOffline);
    $stmt->execute();

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };


  })
?>
