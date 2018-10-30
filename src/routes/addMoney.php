<?php

$app->post('/addMoney', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $amount = $_POST['amountToAdd'];

  $addMoney = "UPDATE appusers SET washPoints = washPoints + $amount WHERE userID = $userID";
  $newBalance = "SELECT washPoints FROM appusers where userID = $userID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->prepare($addMoney);
    $stmt->execute();

    $stmt = $db->query($newBalance);
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    $theThingToReturn = '{"washPoints":';
    $theThingToReturn .= "$user->washPoints}";

    return json_encode($theThingToReturn);

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
