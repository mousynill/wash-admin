<?php

$app->post('/login', function($request, $response){
require_once('../src/config/db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $searchUser = "SELECT * FROM appusers WHERE username = '$username' and password = '$password'";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($searchUser);
    $userExists = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;

    if(!$userExists){
      return die(json_encode('{"connection":"failed"}'));
    }else{
      return json_encode('{"connection":"connected"}');
    }

  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});

$app->get('/try', function(){

    echo "tangina";

})

?>
