<?php

$app->get('/trythis', function($request, $response){
    require_once('../src/config/db.php');
    require '../src/config/surveyObject.php';

    $foo = new Survey();

    $foo->category = new Category();

    echo $foo->category->someshit;

  })
?>
