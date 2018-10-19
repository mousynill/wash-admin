<?php

$app->post('/getMyPoints', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];

  $getPointsQuery = "SELECT washPoints FROM appusers WHERE userID = $userID";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $userPoints = $db->prepare($getPointsQuery);
    $userPoints->execute();
    $theMoneyObject = $userPoints->fetch();

    //the money of the app user
    $theMoney = $theMoneyObject['washPoints'];

    $theThingToReturn = '{"washPoints":';
    $theThingToReturn .= "$theMoney}";

    return $theThingToReturn;
    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
