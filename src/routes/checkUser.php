<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/checkUser', function(Request $request, Response $response){
require_once('../src/config/db.php');

  $username = $_POST['username'];

  $searchUser = "SELECT * FROM appusers WHERE username = '$username'";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($searchUser);
    $userExists = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;

    if(!$userExists){
      return('{"userExists":"false"}');
    }else{
      return('{"userExists":"true"}');
    }

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});

?>
