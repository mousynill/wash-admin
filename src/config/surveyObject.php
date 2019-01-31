<?php

class Survey {
  public $category;
  public $question;
  public $choice;


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

class Category {
  public $someshit="someshit";
}

?>
