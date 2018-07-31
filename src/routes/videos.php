<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

// get all videos
$app->get('/api/videos', function(Request $request, Response $response){
    $sql = "SELECT * FROM videostable";

    try{
      //get dbobject
      $db = new db();
      
      //connect
      $db = $db->connect();

      $stmt = $db->query($sql);
      $videos = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
      echo json_encode($videos);
    }catch(PDOException $e){
      echo '{"error": {"text": '.$e->getMessage().'}';
    };
});
?>
