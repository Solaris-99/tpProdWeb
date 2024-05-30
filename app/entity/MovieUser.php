<?php

require_once 'BaseModel.php';

class MovieUser{

    private string $id_movie;
    private string $id_user;
    
    public function getIdMovie(){
        return $this->id_movie;
    }

    public function getIdUser(){
        return $this->id_user;
    }

}