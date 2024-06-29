<?php
namespace MC\Business;
use MC\DataAccess\CategoryDaoMySql;
use MC\Helpers\Errors\RedirectException;
use PDOException;

class CategoryBusiness extends Business
{
    
    public function __construct()
    {
        $this->dao = new CategoryDaoMySql();
    }

}