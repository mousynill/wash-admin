<?php

  include_once 'includes/dbh.inc.php';

  for ($i=1; $i < 6; $i++) {
    // code...
    $question = $_POST['question'.$i];
    $choice1 = $_POST['ans'.$i.'A'];
    $choice2 = $_POST['ans'.$i.'B'];
    $choice3 = $_POST['ans'.$i.'C'];
    $answer = $_POST['optradio'.$i];


    $sql1 = "INSERT INTO videoquestions(questionContent, choiceOne, choiceTwo, choiceThree, correctAnswer) VALUES ('$question', '$choice1','$choice2','$choice3','$answer')";
    mysqli_query($conn, $sql1);
    error_reporting(E_ALL);
ini_set('display_errors', 1);
  }
?>
