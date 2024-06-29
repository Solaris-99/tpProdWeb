<?php
namespace MC\Business;
use MC\DataAccess\CategoryMovieDaoMySql;
use MC\Helpers\Errors\RedirectException;
use PDOException;

class CategoryMovieBusiness extends Business
{
    
    public function __construct()
    {
        $this->dao = new CategoryMovieDaoMySql();
    }

    public function getMovieAndCategoryName(int $id = null, $includeOtherIds = false){
        return $this->dao->getMovieAndCategoryName($id, $includeOtherIds);
    }

}