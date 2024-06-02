<?php

require_once __DIR__.'/../dataAccess/UserDaoMySql.php';
require_once __DIR__.'/../dataAccess/RoleDaoMySql.php';

class UserBusiness{
    private UserDaoMySql $dao;
    private RoleDaoMySql $roleDao;
    
    public function __construct()
    {
        $this->dao = new UserDaoMySql();
        $this->roleDao = new RoleDaoMySql();
    }

    public function find(int $id, $as_array = false){
        return $this->dao->find($id, $as_array);
    }

    public function all(array $filter, $as_array = false){
        return $this->dao->all($filter, $as_array);
    }

    public function create(array $data){
        unset($data['submit']);
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $data['id_role'] = $this->roleDao->getEndUserRoleId();
        $this->dao->create($data);
        $user = $this->dao->findByEmail($data['email']);
        $_SESSION['id_user'] = $user->getId();
        $_SESSION['id_role'] = $user->getIdRole();

        header('location: index.php');
    }

    public function update(array $data){
        $this->dao->create($data);
    }

    public function delete(int $id){
        $this->dao->delete($id);
    }

    public function getColumns(){
        return $this->dao->getColumns();
    }

}