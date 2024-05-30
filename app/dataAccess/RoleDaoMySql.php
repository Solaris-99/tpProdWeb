<?php

require_once __DIR__ . '/Dao.php';
require_once __DIR__ . '/../entity/Role.php';

class RoleDaoMySql extends Dao{

    public function __construct()
    {   
        global $con;
        $this->pdo = $con;
        $this->table = 'role';
        $this->entityName = 'Role';

    }



}