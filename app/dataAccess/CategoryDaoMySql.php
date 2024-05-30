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
    }

    public function all($filter, $as_array = false)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category");
        if ($as_array) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        }
        $stmt->execute();
        $cats = $stmt->fetchAll();
        return $cats;
        
    }


    public function find($id, $as_array = false){
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE id = ?");
        if ($as_array) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        }
        $stmt->execute([$id]);
        $cat = $stmt->fetch();
        return $cat;
    }

}
