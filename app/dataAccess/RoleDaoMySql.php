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

    public function getEndUserRoleId(){
        $stmt = $this->pdo->prepare("SELECT id FROM role WHERE `name` = 'end_user'");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        return $stmt->fetch()[0];
    }


}