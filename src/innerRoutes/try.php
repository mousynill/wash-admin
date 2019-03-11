<?php

require_once('../src/config/db.php');
// require_once('../assets/objects/ruling.json');

$app->post('/calculatedata', function($request, $response){

  $object = $_POST['Answers'];


  $JSONObject = json_decode($object, true);
  // echo $object->categories;
  print_r($JSONObject['categories'][0]['answers'][1]['answer']);
  })
?>
