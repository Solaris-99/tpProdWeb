<?php

require_once __DIR__.'/../dataAccess/MovieDaoMySql.php';

class MovieBusiness 
{
    private MovieDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new MovieDaoMySql();
    }

    public function find($id){
        $movie = $this->dao->find($id);
        if(empty($movie)){
            echo file_get_contents("404.php");
            die;
        }
        return $this->dao->find($id); //validar si existe;
    }

    public function all($array){
        $movies = $this->dao->all($array);
        return $movies;
    }

    public function getCategories($id){
        $cats =  $this->dao->getCategories($id);
        $catsStr = '';
        foreach($cats as $c){
            $catsStr.= $c[0] . " ";
        }
        return $catsStr;


    }




}