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
  public function name(){
    return $this->name;
  }

}