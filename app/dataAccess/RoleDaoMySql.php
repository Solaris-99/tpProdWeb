<?php
namespace MC\DataAccess;
use MC\DataAccess\Dao;
use MC\Entity\Role;
use PDO;

class RoleDaoMySql extends Dao{

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'role';
        $this->entityName = Role::class;

    }

    public function getEndUserRoleId(){
        $stmt = $this->pdo->prepare("SELECT id FROM role WHERE `name` = 'end_user'");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        return $stmt->fetch()[0];
    }


}