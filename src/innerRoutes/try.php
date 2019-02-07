<?php

require_once('../src/config/db.php');
require_once  '../vendor/autoload.php';
use Phpml\Classification\NaiveBayes;

$app->get('/trythis', function($request, $response){

  $surveyArray = array();

  $currentCategory = "something";

  $toPushObject = new Category();

  $toPushObject->category = $currentCategory;

  array_push($toPushObject->questions, "What is your name");

  array_push($surveyArray, $toPushObject);


  print_r($surveyArray);

  })
?>
