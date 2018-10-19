<?php

$app->post('/buyVideo', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];
  $videoID = $_POST['videoID'];

  //use this query to check get the money of the user.
  $getMoneyQuery = "SELECT washPoints FROM appusers WHERE userID = $userID";

  //use this query to get the price of the video
  $getPriceQuery = "SELECT VideoPrice FROM videostable WHERE IdNo = $videoID";

  //use this query if the price of the video is less than the money owned.
  $updateRelation = "UPDATE uservideos SET isBought = 1 WHERE userID = $userID AND videoID = $videoID";

  //use this query if the relation does not exist
  $insertRelation = "INSERT INTO uservideos(userID, videoID, isBought) VALUES ($userID, $videoID, 1)";

  //use this query if we are going to use update or insert
  $checkRelation = "SELECT * FROM uservideos WHERE userID = $userID and videoID = $videoID";

  //use this query to subtract the price of video from washPoints.
  $updateMoney = "UPDATE appusers SET washPoints = washPoints-:videoPrice WHERE userID = $userID";

  //do not forget to subtract the money upon transaction.

  //if the query returns no row, then use INSERT instead of UPDATE
  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $theChange = $db->prepare($updateMoney, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt = $db->query($checkRelation);
    $relationExists = count($stmt->fetchAll(PDO::FETCH_ASSOC));

    $videoPrice = $db->prepare($getPriceQuery);
    $videoPrice->execute();
    $thePriceObject = $videoPrice->fetch();

    //this is the price of the video
    $thePrice = $thePriceObject['VideoPrice'];

    $userPoints = $db->prepare($getMoneyQuery);
    $userPoints->execute();
    $theMoneyObject = $userPoints->fetch();

    //the money of the app user
    $theMoney = $theMoneyObject['washPoints'];


    //where the transaction starts
    if($theMoney >= $thePrice){
      //proceed to buy
        //on success
          if($relationExists > 0){
              $db->exec($updateRelation);
          }else{
              $db->exec($insertRelation);
          }

        $theChange->execute(array(':videoPrice' => (int)$thePrice));

        return json_encode('{"payment":"successful", "error":"none"}');

    }else if($theMoney < $thePrice){
      //cancel buy
        return json_encode('{"payment":"unsuccessful", "error":"Insufficient WashPoints"}');
    }
    else{
      //something else
        return json_encode('{"payment":"unsuccessful", "error":"There was a problem buying the video."}');
    }

    $db = null;

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
