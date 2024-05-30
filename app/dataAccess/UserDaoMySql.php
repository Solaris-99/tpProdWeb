<?php

require_once __DIR__ . "/Dao.php";
require_once __DIR__ . "/../entity/User.php";

class UserDaoMySql extends Dao {

    public function __construct()
    {   
        global $con;
        $this->pdo = $con;
        $this->table = 'user';
        $this->entityName = 'User';

    }

    
}