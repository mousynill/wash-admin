<?php

$app->get('/trythis', function($request, $response){
    require_once('../src/config/db.php');


    echo 'hello';

  })
?>
