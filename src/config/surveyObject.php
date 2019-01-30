<?php

class Survey {
  var $category;
  var $question;
  var $choice;

    function setCategoryIndex($par){
        $this->category = $par;
    }

    function getCategoryIndex(){
      return $this->category;
    }

    function setQuestionIndex($par){
        $this->question = $par;
    }

    function getQuestionIndeex(){
      return $this->question;
    }

    function setChoiceIndex($par){
        $this->choice = $par;
    }

    function getChoiceIndex(){
      return $this->choice;
    }
}

?>
