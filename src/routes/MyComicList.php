<?php
$app->post('/getMyComics', function($request, $response){
require_once('../src/config/db.php');

  $userID = $_POST['userID'];

  $getMyComics = "SELECT CT.SeriesID, CT.ComicFileName, CT.ComicTitle, CT.ComicAuthor, CT.ComicDescription, CT.ComicThumbnailPath
  FROM comicstable AS CT
  JOIN userscomics AS UC ON UC.seriesID = CT.SeriesID
  JOIN appusers AS AU ON AU.userID = UC.userID
  WHERE AU.userID = $userID AND UC.isLiked = 1";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($getMyComics);
    $series = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;

    return json_encode($series);

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
