<?php

require_once('../src/config/db.php');
// require_once('../assets/objects/ruling.json');

$app->post('/online', function($request, $response){

  $userID = $_POST['userID'];

  $setOnline =  "UPDATE appusers SET isActive = 1 WHERE userID = $userID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($setOnline);
    $stmt->execute();

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };


  })
?>
