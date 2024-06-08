<?php
namespace MC\Business;
use MC\DataAccess\MovieUserDaoMySql;

class MovieUserBusiness{
    private MovieUserDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new MovieUserDaoMySql();
    }

    public function find(int $id, $as_array = false){
        return $this->dao->find($id, $as_array);
    }

    public function all(array $filter, $as_array = false){
        return $this->dao->all($filter, $as_array);
    }

    public function create(array $data){
        unset($data['id']);
        unset($data['SAVE']);
        $this->dao->create($data);
    }

    public function update(array $data){
        $this->dao->update($data);
    }

    public function delete(int $id){
        $this->dao->delete($id);
    }

    public function getColumns(){
        return $this->dao->getColumns();
    }

    public function getMoviesOfUser(int $id_user){
        return $this->dao->getMoviesOfUser($id_user);
    }
}