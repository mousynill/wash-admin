<?php

$app->post('/Register', function($request, $response){
require_once('../src/config/db.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $searchUser = "INSERT INTO appusers(username, password) VALUES ('$username', '$password')";

  try{
    //get dbobject
    $db = new db();

    //connect
    $db = $db->connect();
    $db->exec($searchUser);
    //$stmt = $db->query($searchUser);
    //  $userExists = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    return '{"status":"success"}';
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
  };

});
?>
