<?php
namespace MC\DataAccess;

use MC\DataAccess\Dao;
use MC\Entity\Category;



class CategoryDaoMySql extends Dao

{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'category';
        $this->entityName = Category::class;
    }

}
