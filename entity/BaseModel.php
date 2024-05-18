<?php
abstract class BaseModel
{

    protected $id;
    // protected $createdAt;
    // protected $updatedAt;


    public function getId() {
      return $this->id;
    }
    public function setId(int $id) {
      $this->id = $id;
    }
    
}