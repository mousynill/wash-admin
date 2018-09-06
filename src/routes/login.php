<?php

$app->post('/login', function($request, $response){
require_once('../src/config/db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $searchUser = "SELECT userID FROM appusers WHERE username = '$username' and password = '$password'";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();

    $stmt = $db->query($searchUser);
    $userExists = $stmt->fetch(PDO::FETCH_COLUMN);
    $num = var_export($userExists, true);
    $Num = str_replace("'", "", $num);
    $result = '"userID":'.'"'.$Num.'"';
    $db = null;

    if(!$userExists){
      return die(json_encode('{"connection":"failed"}'));
    }else{
      return json_encode('{"connection":"connected",'.
         $result
        .'}');
    }
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
