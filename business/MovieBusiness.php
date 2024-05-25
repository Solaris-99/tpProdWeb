<?php

require_once __DIR__.'/../dataAccess/MovieDaoMySql.php';
require_once __DIR__ . '/../config/exception_handler.php';
require_once __DIR__.'/../helpers/errors/RedirectException.php';

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
            throw new RedirectException("./404.php","",404);
        }
        return $movie; //validar si existe;
    }

    public function all(array $filter, $as_array = false){
        $movies = $this->dao->all($filter, $as_array);
        return $movies;
    }
    

    /**
     * @param int $id: el id de la pelicula a buscar;
     * @param bool $ids: retorna ids si es verdadero
     */

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
        try{
            $this->dao->create($data);
        }
        catch(Exception $e){
            //arrojar excepcion:
            // no se pudo crear elemento,
            //stack trace?
        }

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