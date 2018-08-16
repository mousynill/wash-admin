<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
$app->get('/api/{path}', function (Request $request, Response $response, array $args) {
    $name = $args['path'];

    if($name=='videos'){

        // VIDEO ROUTE
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

    }
    else if($name=='comics'){

        $sql = "SELECT * FROM comicstable";

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

      }
      else
      {
        echo "no such api";
      }

});



$app->run();
