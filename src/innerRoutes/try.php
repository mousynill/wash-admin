<?php

require_once('../src/config/db.php');
require_once  '../vendor/autoload.php';
require '../src/config/surveyObject.php';
use Phpml\Classification\NaiveBayes;

$app->get('/trythis', function($request, $response){




    $foo = new Survey();


    $classifier = new NaiveBayes();

    // $foo->category = new Category();
    //
    // echo $foo->category->someshit;

  })
?>
