<?php

Class User {

  public $first;
  public $last;
  public $hairColor;
  public $eyeColor;

  public function __construct($first, $last, $hairColor, $eyeColor){
    $this->first = $first;
    $this->last = $last;
    $this->hairColor = $hairColor;
    $this->eyeColor = $eyeColor;
  }

  public function fullName(){
    return $this->first." ".$this->last;
  }

  public function __destruct(){

  }
}