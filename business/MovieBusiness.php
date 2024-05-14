<?php

require_once __DIR__.'/../dataAccess/Dao.php';
require_once __DIR__.'/../dataAccess/MovieDaoMySql.php';

class MovieBusiness 
{
    private Dao $dao;
    
    public function __construct()
    {
        $this->dao = new MovieDaoMySql();
    }

    public function find($id){
        return $this->dao->find($id); //validar si existe;
    }

    public function all(){
        $movies = $this->dao->all();
        return $movies;
    }



}