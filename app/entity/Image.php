<?php
namespace MC\Entity;
use MC\Entity\BaseModel;

class Image extends BaseModel{

    private string $id_movie;
    private string $path;
    private string $is_hero;

    public function getIdMovie(){
        return $this->id_movie;
    }
    public function getPath(){
        return $this->path;
    }
    public function getIsHero(){
        return $this->is_hero == "1";
    }
    
    
}