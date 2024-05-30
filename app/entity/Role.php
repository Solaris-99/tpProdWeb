<?php
require_once 'BaseModel.php';


class Role{

    private string $name;
    private string $permission_level;

    public function getName(){
        return $this->name;
    }
    public function getPermissionLevel(){
        return $this->permission_level;
    }
    
}