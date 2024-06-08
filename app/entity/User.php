<?php
namespace MC\Entity;
use MC\Entity\BaseModel;

class User extends BaseModel{
    private string $username;
    private string $email;
    private string $password;// eliminar? - y llamar cuando sea necesario
    private string $id_role;

    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getIdRole(){
        return $this->id_role;
    }

}
