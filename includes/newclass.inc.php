<?php
/*
  public - can be used anywhere
  protected - can only be used when extended to
  private - can only be used within that class, not even extended classes
*/
class ParentClass{
  protected $name = "Jane";
}

class NewClass extends ParentClass {

  // Properties and Methods go here

  // Constructor and destructor must have two underscores and be called construct and destruct
  public function __construct(){
    echo "<p>This class has been instantiated</p>";
  }

  public function __destruct(){
    echo '<p>This is the end of the class<p>';
  }

  public function name(){
    return $this->name;
  }

  public $data = "I am a property";
  public $error = "This is an error message for ".__CLASS__;

  public function setNewProperty($newData){
    $this->data = $newData;
  }

  public function getProperty(){
    return $this->data;
  }

  public function __toString(){
    echo "toString method: ";
    return $this->error;
  }

  public static $static = 4;

}