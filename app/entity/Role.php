<?php

class Role{

    private string $id;
    private string $name;
    private string $permission_level;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPermissionLevel(){
        return $this->permission_level;
    }
    
}