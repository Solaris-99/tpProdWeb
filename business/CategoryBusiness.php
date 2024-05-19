<?php

require_once __DIR__.'/../dataAccess/CategoryDaoMySql.php';

class CategoryBusiness 
{
    private CategoryDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new CategoryDaoMySql();
    }

    public function find($id, $as_array = false){
        $category = $this->dao->find($id, $as_array);
        return $category; //validar si existe;
    }

    public function all($array, $as_array = false){
        $categorys = $this->dao->all($array, $as_array);
        return $categorys;
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



}