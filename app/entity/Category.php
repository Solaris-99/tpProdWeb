<?php
namespace MC\Entity;
use MC\Entity\BaseModel;



class Category extends BaseModel
{
    private string $name;
    
    public function getName() {
      return $this->name;
    }
    public function setName($value) {
      $this->name = $value;
    }
}