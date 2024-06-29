<?php
namespace MC\Business;
use MC\DataAccess\UserDaoMySql;
use MC\DataAccess\RoleDaoMySql;

class UserBusiness extends Business{
    private RoleDaoMySql $roleDao;
    
    public function __construct()
    {
        $this->dao = new UserDaoMySql();
        $this->roleDao = new RoleDaoMySql();
    }


    public function create(array $data){
        unset($data['submit']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $data['id_role'] = $this->roleDao->find(["id"],[["name","=","end_user"]])->getId();
        $this->dao->create($data);
        $user = $this->dao->find(["*"],[["email","=",$data["email"]]]);
        $_SESSION['id_user'] = $user->getId();
        $_SESSION['id_role'] = $user->getIdRole();
        header('location: index.php');
    }

}