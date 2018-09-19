<?php
$app->post('/getMyVideos', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];

  $getMyVideos = "SELECT VT.IdNo, VT.VideoFileName, VT.VideoTitle, VT.VideoAuthor, VT.VideoDescription, VT.VideoPath, VT.VideoSize, VT.thumbnailPath, VT.viewCount FROM appusers AS AU
  JOIN uservideos AS UV ON AU.userID = UV.userID
  JOIN videostable AS VT ON UV.videoID = VT.IdNo
  WHERE AU.userID = $userID AND UV.isLiked = 1";

  try{
    //get dbobject
    $db = new db();
    //connect
    $db = $db->connect();

    $stmt = $db->query($getMyVideos);
    $videos = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    return json_encode($videos);

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
