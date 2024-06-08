<?php
namespace MC\Entity;
use MC\Entity\BaseModel;

class Role{

    private string $name;
    private string $permission_level;

    public function getName(){
        return $this->name;
    }
    public function getPermissionLevel(){
        return (int) $this->permission_level;
    }
    
}