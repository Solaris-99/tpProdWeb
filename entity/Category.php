<?php
require_once 'BaseModel.php';



class Category extends BaseModel
{
    private $name;
    
    public function getName() {
      return $this->name;
    }
    public function setName($value) {
      $this->name = $value;
    }
}