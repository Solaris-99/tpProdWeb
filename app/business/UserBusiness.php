<?php

require_once __DIR__.'/../dataAccess/UserDaoMySql.php';

class UserBusiness{
    private UserDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new UserDaoMySql();
    }

    public function find(int $id, $as_array = false){
        return $this->dao->find($id, $as_array);
    }

    public function all(array $filter, $as_array = false){
        return $this->dao->all($filter, $as_array);
    }

    public function create(array $data){
        $this->dao->create($data);
    }

    public function update(array $data){
        $this->dao->create($data);
    }

    public function delete(int $id){
        $this->dao->delete($id);
    }

}