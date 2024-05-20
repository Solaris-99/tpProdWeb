<?php

require_once __DIR__.'/../dataAccess/MovieDaoMySql.php';

class MovieBusiness 
{
    private MovieDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new MovieDaoMySql();
    }

    public function find($id, $as_array = false){
        $movie = $this->dao->find($id, $as_array);
        if(empty($movie)){
            echo file_get_contents("404.php");
            die;
        }
        return $movie; //validar si existe;
    }

    public function all(array $filter, $as_array = false){
        $movies = $this->dao->all($filter, $as_array);
        return $movies;
    }

    public function getCategories(int $id, bool $ids = false){


        $cats =  $this->dao->getCategories($id, $ids);
        if($ids){
            //retornar un array de ids
            $cats = array_merge(...$cats);
            return $cats;
        }
        $catsStr = '';
        foreach($cats as $c){
            $catsStr.= $c[0] . " ";
        }
        return $catsStr;
    }

    public function getColumns(){
        return $this->dao->getColumns();
    }
    //TODO: Try catch
    public function create(array $data){
        unset($data['id']);
        unset($data['SAVE']);
        $this->dao->create($data);
    }
    
    //TODO: Try catch
    public function update(array $data){
        unset($data['SAVE']);
        $this->dao->update($data);
    }

    public function delete(int $id){
        $this->dao->delete($id);
    }

    public function getRelated(array $categories, $exclude_id){
        return $this->dao->getRelated($categories, $exclude_id);
    }
}