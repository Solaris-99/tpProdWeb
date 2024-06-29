<?php
namespace MC\Entity;
use MC\Entity\BaseModel;

class MovieUser extends BaseModel{

    private string $id_movie;
    private string $id_user;
    
    public function getIdMovie(){
        return $this->id_movie;
    }

    public function getIdUser(){
        return $this->id_user;
    }

}