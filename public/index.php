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

require_once('../src/routes/login.php');
require_once('../src/routes/checkUser.php');
require_once('../src/routes/Register.php');
require_once('../src/routes/specificSeries.php');
require_once('../src/routes/addView.php');
require_once('../src/routes/likeVideo.php');
require_once('../src/routes/checkVideoUserRelation.php');
require_once('../src/routes/likeSeries.php');
require_once('../src/routes/checkSeriesUserRelation.php');
require_once('../src/routes/MyVideoList.php');
require_once('../src/routes/MyComicList.php');
require_once('../src/routes/checkIfBought.php');
require_once('../src/routes/buyVideo.php');
require_once('../src/routes/getMyPoints.php');
require_once('../src/routes/addMoney.php');
require_once('../src/routes/getQuestions.php');





$app->run();
