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

}