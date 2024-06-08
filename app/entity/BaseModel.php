<?php
namespace MC\Entity;

abstract class BaseModel
{

    protected string $id;

  
    public function getId() {
      return $this->id;
    }
    public function setId(int $id) {
      $this->id = $id;
    }
    
}