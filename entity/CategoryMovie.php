<?php
require_once 'BaseModel.php';



class CategoryMovie extends BaseModel
{
    private int $id_movie;
    private int $id_category;
    
    public function getIdMovie(){
        return $this->id_movie;
    }
    public function setIdMovie($id){
        $this->id_movie = $id;
    }

    public function getIdCategory(){
        return $this->id_category;
    }
    public function setIdCategory($id){
        $this->id_category = $id;
    }

}