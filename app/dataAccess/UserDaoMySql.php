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

    public function findByEmail($email){
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName); 
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        return $data;
    }

    
}