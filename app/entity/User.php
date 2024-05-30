<?php

class user{
    private string $id;
    private string $username;
    private string $email;
    private string $password;// eliminar? - y llamar cuando sea necesario
    private string $role_id;

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRoleId(){
        return $this->role_id;
    }

}
