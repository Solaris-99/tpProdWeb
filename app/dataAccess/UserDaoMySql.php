<?php
namespace MC\DataAccess;
use MC\DataAccess\Dao;
use MC\Entity\User;
use PDO;

class UserDaoMySql extends Dao {

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'user';
        $this->entityName = User::class;

    }
    
}