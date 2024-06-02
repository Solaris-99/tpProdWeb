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

    public function findByEmail($email){
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName); 
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        return $data;
    }

    
}