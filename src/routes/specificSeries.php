<?php

$app->post('/series', function($request, $response){
require_once('../src/config/db.php');

  $id = $_POST['id'];

  $sql = "SELECT chapterNo, chapterTitle, chapterPath FROM trychaptertable WHERE seriesID = $id ORDER BY chapterNo ASC";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($sql);
    $comics = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    echo json_encode($comics);
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
