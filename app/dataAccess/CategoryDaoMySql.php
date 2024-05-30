<?php
require_once __DIR__ . '/Dao.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../entity/Category.php';



class CategoryDaoMySql extends Dao

{
    public function __construct()
    {
        global $con;
        $this->pdo = $con;
        $this->table = 'category';
        $this->entityName = 'Category';
    }

}
