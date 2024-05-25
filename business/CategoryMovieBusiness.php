<?php

require_once __DIR__.'/../dataAccess/CategoryMovieDaoMySql.php';

class CategoryMovieBusiness 
{
    private CategoryMovieDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new CategoryMovieDaoMySql();
    }

    public function find($id, $as_array = false){
        $data = $this->dao->find($id, $as_array);
        return $data; //validar si existe;
    }

    public function all($array, $as_array = false){
        $data = $this->dao->all($array, $as_array);
        return $data;
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

    public function getMovieAndCategoryName(int $id = null, $includeOtherIds = false){
        return $this->dao->getMovieAndCategoryName($id, $includeOtherIds);
    }

}